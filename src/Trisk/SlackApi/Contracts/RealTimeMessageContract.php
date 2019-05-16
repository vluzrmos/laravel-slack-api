<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\SlackResponse;

/**
 * Interface RealTimeMessageContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface RealTimeMessageContract
{
    /**
     * This method starts a Real Time Messaging API session.
     * Refer to the RTM API documentation for full details on how to use the RTM API.
     *
     * @return SlackResponse
     */
    public function start(): SlackResponse;
}
