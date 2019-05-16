<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\InstantMessageResponse;

/**
 * Interface InstantMessageContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface InstantMessageContract
{
    /**
     * This method closes a direct message channel.
     *
     * @param string $channel Direct message channel to close.
     *
     * @return InstantMessageResponse
     */
    public function close(string $channel): InstantMessageResponse;

    /**
     * This method returns a portion of messages/events from the specified channel.
     * To read the entire history for a channel, call the method with no `latest` or `oldest` arguments,
     * and then continue paging using the instructions below.
     * @see https://api.slack.com/methods/channels.history
     *
     * @param string $channel Channel to fetch history for.
     * @param int    $count Number of messages to return, between 1 and 1000.
     * @param string $latest End of time range of messages to include in results.
     * @param string    $oldest Start of time range of messages to include in results.
     * @param int    $inclusive Include messages with latest or oldest timestamp in results.
     *
     * @return InstantMessageResponse
     */
    public function history(string $channel, int $count, string $latest, string $oldest, int $inclusive): InstantMessageResponse;

    /**
     * This method returns a list of all im channels that the user has.
     *
     * @return InstantMessageResponse
     */
    public function lists(): InstantMessageResponse;

    /**
     * @return InstantMessageResponse
     */
    public function all(): InstantMessageResponse;

    /**
     * This method moves the read cursor in a direct message channel.
     *
     * @param string $channel
     * @param string $ts
     *
     * @return InstantMessageResponse
     */
    public function mark(string $channel, string $ts): InstantMessageResponse;

    /**
     * This method opens a direct message channel with another member of your Slack team.
     * @param string $user
     *
     * @return InstantMessageResponse
     */
    public function open(string $user): InstantMessageResponse;
}
