<?php

namespace Trisk\SlackApi\Contracts;

interface SlackTeam
{
    public function info();
    public function accessLogs($options = []);
}
