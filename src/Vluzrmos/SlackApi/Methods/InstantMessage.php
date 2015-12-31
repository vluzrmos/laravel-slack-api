<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackInstantMessage;

class InstantMessage extends SlackMethod implements SlackInstantMessage
{
    protected $methodsGroup = 'im.';

    /**
     * This method closes a direct message channel.
     *
     * @param string $channel Direct message channel to close.
     *
     * @return array
     */
    public function close($channel)
    {
        return $this->method('close', compact('channel'));
    }

    /**
     * This method returns a portion of messages/events from the specified channel.
     * To read the entire history for a channel, call the method with no `latest` or `oldest` arguments,
     * and then continue paging using the instructions below.
     * @see https://api.slack.com/methods/channels.history
     *
     * @param string $channel Channel to fetch history for.
     * @param int    $count Number of messages to return, between 1 and 1000.
     * @param string $latest End of time range of messages to include in results.
     * @param int|string    $oldest Start of time range of messages to include in results.
     * @param int    $inclusive Include messages with latest or oldest timestamp in results.
     *
     * @return array
     */
    public function history($channel, $count = 100, $latest = null, $oldest = 0, $inclusive = 1)
    {
        return $this->method('history', compact('channel', 'count', 'latest', 'oldest', 'inclusive'));
    }

    /**
     * This method returns a list of all im channels that the user has.
     *
     * @return array
     */
    public function lists()
    {
        return $this->method('list');
    }

    /**
     * This method returns a list of all im channels that the user has.
     *
     * @return array
     */
    public function all()
    {
        return $this->method('list');
    }

    /**
     * This method moves the read cursor in a direct message channel.
     *
     * @param string $channel
     * @param int|string $ts
     *
     * @return array
     */
    public function mark($channel, $ts)
    {
        return $this->method('mark', compact('channel', 'ts'));
    }

    /**
     * This method opens a direct message channel with another member of your Slack team.
     * @param string $user
     *
     * @return array
     */
    public function open($user)
    {
        return $this->method('open', compact('user'));
    }
}
