<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\ChatContract;
use Trisk\SlackApi\Response\ChatResponse;
use Trisk\SlackApi\Response\SlackResponse;

/**
 * Class Chat
 *
 * @package Trisk\SlackApi\Methods
 */
class Chat extends SlackMethod implements ChatContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'chat.';

    /**
     * @inheritdoc
     */
    public function delete(string $channel, string $ts): ChatResponse
    {
        return $this->arrayToResponse($this->method('delete', compact('channel', 'ts')));
    }

    /**
     * @inheritdoc
     */
    public function message(string $channel, string $text, array $options = []): ChatResponse
    {
        return $this->arrayToResponse($this->method('postMessage', array_merge(compact('channel', 'text'), ['as_user' => ! isset($options['username'])], $options)));
    }

    /**
     * @inheritdoc
     */
    public function postMessage(string $channel, string $text, array $options = []): ChatResponse
    {
        return $this->message($channel, $text, $options);
    }

    /**
     * @inheritdoc
     */
    public function update(string $channel, string $text, string $ts): ChatResponse
    {
        return $this->arrayToResponse($this->method('update', compact('channel', 'text', 'ts')));
    }

    /**
     * @param array $response
     *
     * @return ChatResponse
     */
    private function arrayToResponse(array $response): ChatResponse
    {
        return new ChatResponse($response);
    }
}
