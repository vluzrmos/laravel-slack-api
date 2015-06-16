<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackRealTimeMessage;

class RealTimeMessage extends SlackMethod implements SlackRealTimeMessage
{
    protected $methodsGroup = 'rtm.';

    /**
     * This method starts a Real Time Messaging API session.
     * Refer to the RTM API documentation for full details on how to use the RTM API.
     *
     * @return array
     */
    public function start()
    {
        return $this->method('start');
    }
}
