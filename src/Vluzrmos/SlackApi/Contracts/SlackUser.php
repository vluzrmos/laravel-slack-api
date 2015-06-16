<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackUser
{
    public function getPresence($user);
    public function info($user);
    public function lists();
    public function all();
    public function setActive();
    public function setPresence($presence);
}
