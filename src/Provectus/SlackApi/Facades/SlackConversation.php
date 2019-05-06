<?php

namespace Provectus\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackConversation extends Facade
{
    /**
    * @return string
    */
    protected static function getFacadeAccessor()
    {
        return 'slack.conversation';
    }
}
