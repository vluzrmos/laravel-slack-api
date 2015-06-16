<?php
/**
 * Created by PhpStorm.
 * User: vluzrmos
 * Date: 15/06/15
 * Time: 22:10
 */

namespace Vluzrmos\SlackApi\Methods;


use Vluzrmos\SlackApi\Contracts\SlackApi;

class AbstractMethod
{
	/**
	 * Prefix of the api methods to allow you to use short method names
	 * @var string
	 */
	protected $methodPrefix = "api.";

	/**
	 * @var \Vluzrmos\SlackApi\Contracts\SlackApi
	 */
	protected $api;


	public function __construct(SlackApi $api){
		$this->api = $api;
	}

	/**
	 * Sends a http request
	 *
	 * @param string $method short method of the api (only the suffix, after ".")
	 * @param array  $params params to the given method
	 * @param string $http http verb
	 *
	 * @return array
	 */
	public function method($method, $params = [], $http = "post"){
		return $this->api->$http($this->methodPrefix.$method, $params);
	}

}
