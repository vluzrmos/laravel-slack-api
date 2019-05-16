<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\InstantMessageContract;
use Trisk\SlackApi\Response\InstantMessageResponse;

/**
 * Class InstantMessage
 *
 * @package Trisk\SlackApi\Methods
 */
class InstantMessage extends SlackMethod implements InstantMessageContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'im.';

    /**
     * @inheritdoc
     */
    public function close(string $channel): InstantMessageResponse
    {
        return $this->arrayToResponse($this->method('close', compact('channel')));
    }

    /**
     * @inheritdoc
     */
    public function history(string $channel, int $count, string $latest, string $oldest, int $inclusive): InstantMessageResponse
    {
        return $this->arrayToResponse($this->method('history', compact('channel', 'count', 'latest', 'oldest', 'inclusive')));
    }

    /**
     * @inheritdoc
     */
    public function lists(): InstantMessageResponse
    {
        return $this->arrayToResponse($this->method('list'));
    }

    /**
     * @inheritdoc
     */
    public function all(): InstantMessageResponse
    {
        return $this->arrayToResponse($this->method('list'));
    }

    /**
     * @inheritdoc
     */
    public function mark(string $channel, string $ts): InstantMessageResponse
    {
        return $this->arrayToResponse($this->method('mark', compact('channel', 'ts')));
    }

    /**
     * @inheritdoc
     */
    public function open(string $user): InstantMessageResponse
    {
        return $this->arrayToResponse($this->method('open', compact('user')));
    }

    /**
     * @param array $response
     *
     * @return InstantMessageResponse
     */
    private function arrayToResponse(array $response): InstantMessageResponse
    {
        return new InstantMessageResponse($response);
    }
}
