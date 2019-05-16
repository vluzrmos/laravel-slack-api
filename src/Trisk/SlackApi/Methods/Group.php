<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\GroupContract;
use Trisk\SlackApi\Response\GroupResponse;

/**
 * Class Group
 *
 * @package Trisk\SlackApi\Methods
 */
class Group extends Channel implements GroupContract
{
    protected $methodsGroup = 'groups.';

    /**
     * @inheritdoc
     */
    public function open(string $channel): GroupResponse
    {
        return $this->arrayToResponse($this->method('open', compact('channel')));
    }

    /**
     * @inheritdoc
     */
    public function close(string $channel): GroupResponse
    {
        return $this->arrayToResponse($this->method('close', compact('channel')));
    }

    /**
     * @inheritdoc
     */
    public function createChild(string $channel): GroupResponse
    {
        return $this->arrayToResponse($this->method('createChild', compact('channel')));
    }

    /**
     * @param array $response
     *
     * @return GroupResponse
     */
    private function arrayToResponse(array $response): GroupResponse
    {
        return new GroupResponse($response);
    }
}
