<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackOAuthV2
{
    public function access($code, $options = []);
}
