<?php

namespace Vluzrmos\SlackApi;

use GuzzleHttp\Client;

class SlackApi{

  /**
   *
   * @var \GuzzleHttp\Client
   */
  private $client;

  /**
   * Token of the user of the Slack team (with administrator levels)
   * @var string
   */
  private $token;

  /**
   * Url to slack.com, by default will use https://slack.com/api
   * @var String
   */
  private $url = "https://slack.com/api";

  function __construct(Client $client, $token=null){
    $this->client = $client;
    $this->token = $token;
  }


  /**
   * Send a GET Request
   * @param $apiMethod
   * @param array $parameters
   * @return \GuzzleHttp\Message\ResponseInterface
   */
  public function get($apiMethod, $parameters = []){
    return $this->getClient()->get($apiMethod, $parameters);
  }

  /**
   * Send a POST Request
   * @param $apiMethod
   * @param array $parameters
   * @return \GuzzleHttp\Message\ResponseInterface
   */
  public function post($apiMethod, $parameters = []){
    return $this->getClient()->post($this->getUrl($apiMethod), $this->mergeParameters($parameters));
  }

  /**
   * Send a PUT Request
   * @param $apiMethod
   * @param array $parameters
   * @return \GuzzleHttp\Message\ResponseInterface
   */
  public function put($apiMethod, $parameters = []){
    return $this->getClient()->put($this->getUrl($apiMethod), $this->mergeParameters($parameters));
  }

  /**
   * Send a DELETE Request
   * @param $apiMethod
   * @param array $parameters
   * @return \GuzzleHttp\Message\ResponseInterface
   */
  public function delete($apiMethod, $parameters = []){
    return $this->getClient()->delete($this->getUrl($apiMethod), $this->mergeParameters($parameters));
  }

  /**
   * Send a PATCH Request
   * @param $apiMethod
   * @param array $parameters
   * @return \GuzzleHttp\Message\ResponseInterface
   */
  public function patch($apiMethod, $parameters = []){
    return $this->getClient()->patch($this->getUrl($apiMethod), $this->mergeParameters($parameters));
  }

  /**
   * Generate the url with the api $method.
   * @param null $method
   * @return string
   */
  protected function getUrl($method=null){
    return str_finish($this->url, "/api/").$method;
  }

  /**
   * Get the user token
   * @return null|string
   */
  protected function getToken(){
    return $this->token;
  }

  /**
   * Merge parameters of the request with token em timestamp string
   * @param $parameters
   * @return mixed
   */
  protected function mergeParameters($parameters){
    $parameters['query'] = array_merge([
        't' => time(),
        'token' => $this->getToken()
    ], array_get($parameters, 'query', []));

    $parameters['body'] = array_get($parameters, 'body', []);

    return $parameters;
  }

  public function getClient(){
    return $this->client;
  }
}