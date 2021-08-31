<?php

namespace Vluzrmos\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackOAuthV2 extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slack.o_auth_v2';
    }
}
