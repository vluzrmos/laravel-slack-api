<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\ChannelResponse;

/**
 * Interface ConversationContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface ConversationContract
{
    /**
     * This method returns a list of all channels in the team with private and public
     *
     * @param int    $exclude_archived
     * @param string $types of available types : public_channel,private_channel...
     * @param int    $limit default=100
     *
     * @return ChannelResponse
     */
    public function lists(int $exclude_archived = 1, string $types= 'public_channel,private_channel', int $limit = 100): ChannelResponse;
}
