<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackChannel
{
    public function archive($channel);
    public function unarchive($channel);
    public function create($name);
    public function history($channel, $count, $latest, $oldest, $inclusive);
    public function info($channel);
    public function invite($channel, $user);
    public function join($name);
    public function kick($channel, $user);
    public function leave($channel);
    public function all($exclude_archived);
    public function lists($exclude_archived);
    public function mark($channel, $ts);
    public function rename($channel, $name);
    public function setPurpose($channel, $purpose);
    public function setTopic($channel, $topic);
}
