<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackInstantMessage
{
    public function close($channel);
    public function history($channel, $count = 100, $latest = null, $oldest = 0, $inclusive = 1);
    public function lists();
    public function all();
    public function mark($channel, $ts);
    public function open($user);
}
