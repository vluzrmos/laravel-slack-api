<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackOAuth
{
    public function access($code, $options = []);
}
