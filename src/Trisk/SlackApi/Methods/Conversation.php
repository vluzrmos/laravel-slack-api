<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\ConversationContract;
use Trisk\SlackApi\Response\ChannelResponse;

/**
 * Class Conversations
 *
 * @package Trisk\SlackApi\Methods
 */
class Conversation extends SlackMethod implements ConversationContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'conversations.';

    /**
     * @inheritdoc
     */
    public function lists(int $exclude_archived = 1, string $types= 'public_channel,private_channel', int $limit = 100): ChannelResponse
    {
        return $this->arrayToResponse($this->method('list', compact(['exclude_archived', 'types', 'limit'])));
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
