<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackConversation;

/**
 * Class Conversations
 *
 * @package Vluzrmos\SlackApi\Methods
 */
class Conversations extends SlackMethod implements SlackConversation
{
    protected $methodsGroup = 'conversations.';

    /**
     * This method returns a list of all channels in the team with private and public
     *
     * @see https://api.slack.com/methods/conversations.list
     *
     * @param int $exclude_archived Don't return archived channels.
     * @param string   $types
     * @param int $limit
     *
     * @return void
     */
    public function lists($exclude_archived, $types = 'public_channel,private_channel', $limit = 100)
    {
        return $this->method('list', compact(['exclude_archived', 'types', 'limit']));
    }
}
