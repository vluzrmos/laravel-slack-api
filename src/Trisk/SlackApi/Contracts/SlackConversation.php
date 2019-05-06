<?php

namespace Trisk\SlackApi\Contracts;

/**
 * Interface SlackConversation
 *
 * @package Trisk\SlackApi\Contracts
 */
interface SlackConversation
{
    /**
     * @param $exclude_archived
     * @param int $limit default=100
     * @param array $types   of available types : [public_channel,private_channel]
     *
     * @return array
     */
    public function lists($exclude_archived, $types, $limit = 100);
}
