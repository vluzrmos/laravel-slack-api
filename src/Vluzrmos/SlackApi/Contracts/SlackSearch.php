<?php
/**
 * Created by PhpStorm.
 * User: vluzrmos
 * Date: 15/06/15
 * Time: 23:58
 */

namespace Vluzrmos\SlackApi\Contracts;


interface SlackSearch
{
	public function all($query, $sort, $options = []);
	public function files($query, $sort, $options = []);
	public function messages($query, $sort, $options = []);
}
