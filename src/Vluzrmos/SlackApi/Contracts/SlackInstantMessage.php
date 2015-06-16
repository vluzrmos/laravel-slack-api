<?php
/**
 * Created by PhpStorm.
 * User: vluzrmos
 * Date: 15/06/15
 * Time: 23:31
 */

namespace Vluzrmos\SlackApi\Contracts;


interface SlackInstantMessage
{
	public function close($channel);
	public function history($channel, $count, $latest, $oldest, $inclusive);
	public function lists();
	public function all();
	public function mark($channel, $ts);
	public function open($user);
}
