<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\RealTimeMessageContract;
use Trisk\SlackApi\Response\SlackResponse;

/**
 * Class RealTimeMessage
 *
 * @package Trisk\SlackApi\Methods
 *
 * @deprecated
 */
class RealTimeMessage extends SlackMethod implements RealTimeMessageContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'rtm.';

    /**
     * @inheritdoc
     */
    public function start(): SlackResponse
    {
        return new SlackResponse($this->method('start'));
    }
}
