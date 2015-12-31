<?php

namespace Vluzrmos\SlackApi;

use GuzzleHttp\Client;
use Illuminate\Support\Traits\Macroable;
use Vluzrmos\SlackApi\Contracts\SlackApi as Contract;

class SlackApi implements Contract
{
    use Macroable;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * Token of the user of the Slack team (with administrator levels).
     *
     * @var string
     */
    private $token;

    /**
     * Url to slack.com, by default will use https://slack.com/api.
     *
     * @var String
     */
    private $url = 'https://slack.com/api';

    /**
     * @param Client|null $client
     * @param String|null $token
     */
    public function __construct(Client $client = null, $token = null)
    {
        $this->setClient($client);
        $this->setToken($token);
    }

    /**
     * Send a GET Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function get($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->http('get', $url, $parameters);
    }

    /**
     * Send a POST Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function post($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->http('post', $url, $parameters);
    }

    /**
     * Send a PUT Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function put($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->http('put', $url, $parameters);
    }

    /**
     * Send a DELETE Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function delete($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->http('delete', $url, $parameters);
    }

    /**
     * Send a PATCH Request.
     *
     * @param       $apiMethod
     * @param array $parameters
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function patch($apiMethod, $parameters = [])
    {
        $url = $this->getUrl($apiMethod);
        $parameters = $this->mergeParameters($parameters);

        return $this->http('patch', $url, $parameters);
    }

    /**
     * Loads an Slack Method by its contract short name.
     *
     * @param $method
     *
     * @example $slack->load('Channel')->lists()
     *
     * @return mixed
     */
    public function load($method)
    {
        if (str_contains($method, '.')) {
            return app($method);
        }

        $contract = __NAMESPACE__.'\\Contracts\\Slack'.studly_case($method);

        if (class_exists($contract)) {
            return app($contract);
        }

        return app('slack.'.snake_case($method));
    }

    /**
     * Alias to ::load.
     *
     * @param $method
     *
     * @return mixed
     */
    public function __invoke($method)
    {
        return $this->load($method);
    }

    /**
     * Set the token of your slack team member (be sure is admin token).
     *
     * @param $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Configures the Guzzle Client.
     *
     * @param \GuzzleHttp\Client|Callback|null $client
     */
    public function setClient($client = null)
    {
        if (is_callable($client)) {
            $this->client = value($client);
        } elseif (is_null($client) and is_null($this->client)) {
            $this->client = new Client(['verify' => false]);
        } else {
            $this->client = $client;
        }

        if (method_exists($this->client, 'setDefaultOption')) {
            $this->client->setDefaultOption('verify', false);
        }
    }

    /**
     * Performs an HTTP Request.
     * @param string $verb HTTP Verb
     * @param string $url Url to the request
     * @param array  $parameters parameters to send
     *
     * @return array
     */
    protected function http($verb = 'get', $url = '', $parameters = [])
    {
        /* @var  \GuzzleHttp\Psr7\Response|\GuzzleHttp\Message\Response $response */
        try {
            $response = $this->getHttpClient()->$verb($url, $parameters);
        } catch (\InvalidArgumentException $e) {
            $parameters['body'] = $parameters['form_params'];

            unset($parameters['form_params']);

            $response = $this->getHttpClient()->$verb($url, $parameters);
        }

        /** @var  $contents */
        $contents = $this->responseToJson($response);

        return $contents;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response|\GuzzleHttp\Message\Response $response
     * @return array
     */
    protected function responseToJson($response)
    {
        return json_decode($response->getBody()->getContents());
    }

    /**
     * Merge parameters of the request with token and timestamp string.
     *
     * @param $parameters
     *
     * @return array
     */
    protected function mergeParameters($parameters = [])
    {
        $options['query'] = [
            't' => time(),
            'token' => $this->getToken(),
        ];

        if (isset($parameters['attachments']) and is_array($parameters['attachments'])) {
            $parameters['attachments'] = json_encode($parameters['attachments']);
        }

        $options['form_params'] = $parameters;

        return $options;
    }

    /**
     * Get the Guzzle Client.
     *
     * @return Client
     */
    protected function getHttpClient()
    {
        return $this->client;
    }

    /**
     * Generate the url with the api $method.
     *
     * @param string|null $method
     *
     * @return string
     */
    protected function getUrl($method = null)
    {
        return str_finish($this->url, '/').$method;
    }

    /**
     * Get the user token.
     *
     * @return null|string
     */
    protected function getToken()
    {
        return $this->token;
    }
}
