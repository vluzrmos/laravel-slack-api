<?php

namespace Trisk\SlackApi;

use GuzzleHttp\Client;
use Illuminate\Support\Traits\Macroable;
use Trisk\SlackApi\Contracts\ApiContract;

/**
 * Class SlackApi
 *
 * @package Trisk\SlackApi
 */
class SlackApi implements ApiContract
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
        $this->setClient($client)
            ->setToken($token);
    }

    /**
     * @inheritdoc
     */
    public function get(string $apiMethod, array $parameters = []): array
    {
        return $this->http('get', $this->getUrl($apiMethod), $this->mergeParameters($parameters));
    }

    /**
     * @inheritdoc
     */
    public function post(string $apiMethod, array $parameters = []): array
    {
        return $this->http('post', $this->getUrl($apiMethod), $this->mergeParameters($parameters));
    }

    /**
     * @inheritdoc
     */
    public function put(string $apiMethod, array $parameters = []): array
    {
        return $this->http('put', $this->getUrl($apiMethod), $this->mergeParameters($parameters));
    }

    /**
     * @inheritdoc
     */
    public function delete(string $apiMethod, array $parameters = []): array
    {
        return $this->http('delete', $this->getUrl($apiMethod), $this->mergeParameters($parameters));
    }

    /**
     * @inheritdoc
     */
    public function patch(string $apiMethod, array $parameters = []): array
    {
        return $this->http('patch', $this->getUrl($apiMethod), $this->mergeParameters($parameters));
    }

    /**
     * Loads an Slack Method by its contract short name.
     *
     * @param string $method
     *
     * @example $slack->load('Channel')->lists()
     *
     * @return mixed
     */
    public function load(string $method)
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
     * @param string $method
     *
     * @return mixed
     */
    public function __invoke(string $method)
    {
        return $this->load($method);
    }

    /**
     * Set the token of your slack team member (be sure is admin token).
     *
     * @param string|null $token
     *
     * @return SlackApi
     */
    private function setToken(?string $token): SlackApi
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Configures the Guzzle Client.
     *
     * @param \GuzzleHttp\Client|Callback|null $client
     *
     * @return SlackApi
     */
    private function setClient(?\GuzzleHttp\Client $client = null): SlackApi
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

        return $this;
    }

    /**
     * Performs an HTTP Request.
     * @param string $verb HTTP Verb
     * @param string $url Url to the request
     * @param array  $parameters parameters to send
     *
     * @return array
     */
    protected function http(string $verb = 'get', string $url = '', array $parameters = []): array
    {
        try {
            $response = $this->getHttpClient()->$verb($url, $parameters);
        } catch (\InvalidArgumentException $e) {
            $parameters['body'] = $parameters['form_params'];

            unset($parameters['form_params']);

            $response = $this->getHttpClient()->$verb($url, $parameters);
        }

        $contents = $this->responseToArray($response);

        return $contents;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     * @return array
     */
    protected function responseToArray(\GuzzleHttp\Psr7\Response $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Merge parameters of the request with token and timestamp string.
     *
     * @param $parameters
     *
     * @return array
     */
    protected function mergeParameters(array $parameters = []): array
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
     * @return Client|null
     */
    protected function getHttpClient(): ?Client
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
    protected function getUrl($method = null): string
    {
        return str_finish($this->url, '/').$method;
    }

    /**
     * Get the user token.
     *
     * @return null|string
     */
    protected function getToken(): ?string
    {
        return $this->token;
    }
}
