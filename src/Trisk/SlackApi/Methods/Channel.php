<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\ChannelContract;
use Trisk\SlackApi\Response\ChannelResponse;

/**
 * Class Channel
 *
 * @package Trisk\SlackApi\Methods
 */
class Channel extends SlackMethod implements ChannelContract
{
    protected $methodsGroup = 'channels.';

    /**
     * @inheritdoc
     */
    public function archive(string $channel): ChannelResponse
    {
        return $this->arrayToResponse($this->method('archive', ['channel' => $channel]));
    }

    /**
     * @inheritdoc
     */
    public function restore(string $channel): ChannelResponse
    {
        return $this->arrayToResponse($this->method('unarchive', compact($channel)));
    }

    /**
     * @inheritdoc
     */
    public function create(string $name): ChannelResponse
    {
        return $this->arrayToResponse($this->method('create', ['name' => $name]));
    }

    /**
     * @inheritdoc
     */
    public function history(string $channel, int $count = 100, string $latest = null, int $oldest = 0, int $inclusive = 1): ChannelResponse
    {
        return $this->arrayToResponse($this->method('history', compact('channel', 'count', 'latest', 'oldest', 'inclusive')));
    }

    /**
     * @inheritdoc
     */
    public function info(string $channel): ChannelResponse
    {
        return $this->arrayToResponse($this->method('info', ['channel' => $channel]));
    }

    /**
     * @param string $channel
     * @param string $user
     *
     * @inheritdoc
     */
    public function invite(string $channel, string $user): ChannelResponse
    {
        return $this->arrayToResponse($this->method('invite', compact('channel', 'user')));
    }

    /**
     * @inheritdoc
     */
    public function join(string $name): ChannelResponse
    {
        return $this->arrayToResponse($this->method('join', ['name' => $name]));
    }

    /**
     * @inheritdoc
     */
    public function kick(string $channel, string $user): ChannelResponse
    {
        return $this->arrayToResponse($this->method('kick', compact('channel', 'user')));
    }

    /**
     * @inheritdoc
     */
    public function leave(string $channel): ChannelResponse
    {
        return $this->arrayToResponse($this->method('leave', ['channel' => $channel]));
    }

    /**
     * @inheritdoc
     */
    public function all(int $exclude_archived = 1): ChannelResponse
    {
        return $this->arrayToResponse($this->method('list', compact('exclude_archived')));
    }

    /**
     * @inheritdoc
     */
    public function lists(int $exclude_archived = 1): ChannelResponse
    {
        return $this->all($exclude_archived);
    }

    /**
     * @inheritdoc
     */
    public function mark(string $channel, string $ts): ChannelResponse
    {
        return $this->arrayToResponse($this->method('mark', compact($channel, $ts)));
    }

    /**
     * @inheritdoc
     */
    public function rename(string $channel, string $name): ChannelResponse
    {
        return $this->arrayToResponse($this->method('rename', compact($channel, $name)));
    }

    /**
     * @inheritdoc
     */
    public function setPurpose(string $channel, string $purpose): ChannelResponse
    {
        return $this->arrayToResponse($this->method('setPurpose', compact($channel, $purpose)));
    }

    /**
     * @inheritdoc
     */
    public function setTopic(string $channel, string $topic): ChannelResponse
    {
        return $this->arrayToResponse($this->method('setPurpose', compact($channel, $topic)));
    }

    /**
     * @param array $response
     *
     * @return ChannelResponse
     */
    private function arrayToResponse(array $response): ChannelResponse
    {
        return new ChannelResponse($response);
    }
}
