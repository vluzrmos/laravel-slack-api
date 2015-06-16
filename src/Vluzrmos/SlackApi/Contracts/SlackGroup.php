<?php
/**
 * Created by PhpStorm.
 * User: vluzrmos
 * Date: 15/06/15
 * Time: 22:59
 */

namespace Vluzrmos\SlackApi\Contracts;


interface SlackGroup extends SlackChannel
{
	public function open($channel);
	public function close($channel);
	public function createChild($channel);
}
