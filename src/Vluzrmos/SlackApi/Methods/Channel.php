<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackChannel;

class Channel extends SlackMethod implements SlackChannel
{
    protected $methodsGroup = 'channels.';

    /**
     * This method archives a channel.
     *
     * @param string $channel Channel to archive
     *
     * @return array
     */
    public function archive($channel)
    {
        return $this->method('archive', ['channel' => $channel]);
    }

    /**
     * This method crate a channel with a given name.
     *
     * @param string $name Name of channel to create
     *
     * @return array
     */
    public function create($name)
    {
        return $this->method('create', ['name' => $name]);
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
     * @param int    $oldest Start of time range of messages to include in results.
     * @param int    $inclusive Include messages with latest or oldest timestamp in results.
     *
     * @return array
     */
    public function history($channel, $count = 100, $latest = null, $oldest = 0, $inclusive = 1)
    {
        return $this->method('history', compact('channel', 'count', 'latest', 'oldest', 'inclusive'));
    }

    /**
     * This method returns information about a team channel.
     *
     * @see https://api.slack.com/methods/channels.info
     *
     * @param string $channel Channel to get info on
     *
     * @return array
     */
    public function info($channel)
    {
        return $this->method('info', ['channel' => $channel]);
    }

    /**
     * This method is used to invite a user to a channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/channels.invite
     *
     * @param string $channel
     * @param string $user
     *
     * @return array
     */
    public function invite($channel, $user)
    {
        return $this->method('invite', compact('channel', 'user'));
    }

    /**
     * This method is used to join a channel. If the channel does not exist, it is created.
     *
     * @see https://api.slack.com/methods/channels.join
     *
     * @param string $name Channel name to join in
     *
     * @return array
     */
    public function join($name)
    {
        return $this->method('join', ['name' => $name]);
    }

    /**
     * This method allows a user to remove another member from a team channel.
     *
     * @see https://api.slack.com/methods/channels.kick
     *
     * @param string $channel
     * @param string $user
     *
     * @return array
     */
    public function kick($channel, $user)
    {
        return $this->method('kick', compact('channel', 'user'));
    }

    /**
     * This method is used to leave a channel.
     *
     * @see https://api.slack.com/methods/channels.leave
     *
     * @param string $channel
     *
     * @return array
     */
    public function leave($channel)
    {
        return $this->method('leave', ['channel' => $channel]);
    }

    /**
     * This method returns a list of all channels in the team. This includes channels the caller is in, channels they are not currently in, and archived channels.
     * The number of (non-deactivated) members in each channel is also returned.
     *
     * @see https://api.slack.com/methods/channels.list
     *
     * @param int $exclude_archived Don't return archived channels.
     *
     * @return array
     */
    public function all($exclude_archived = 1)
    {
        return $this->method('list', compact('exclude_archived'));
    }

    /**
     * This method returns a list of all channels in the team. This includes channels the caller is in, channels they are not currently in, and archived channels.
     * The number of (non-deactivated) members in each channel is also returned.
     *
     * @see https://api.slack.com/methods/channels.list
     *
     * @param int $exclude_archived Don't return archived channels.
     *
     * @return array
     */
    public function lists($exclude_archived = 1)
    {
        return $this->all($exclude_archived);
    }

    /**
     * This method moves the read cursor in a channel.
     *
     * @see https://api.slack.com/methods/channels.mark
     *
     * @param string     $channel Channel to set reading cursor in.
     * @param string|int $ts      Timestamp of the most recently seen message.
     *
     * @return array
     */
    public function mark($channel, $ts)
    {
        return $this->method('mark', compact($channel, $ts));
    }

    /**
     * This method renames a team channel.
     *
     * The only people who can rename a channel are team admins, or the person that originally
     * created the channel. Others will recieve a "not_authorized" error.
     *
     * @see https://api.slack.com/methods/channels.rename
     *
     * @param string $channel Channel to rename
     *
     * @param  string $name New name for channel
     *
     * @return array
     */
    public function rename($channel, $name)
    {
        return $this->method('rename', compact($channel, $name));
    }

    /**
     * This method is used to change the purpose of a channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/channels.setPurpose
     *
     * @param string $channel Channel to set the purpose of
     * @param string $purpose The new purpose
     *
     * @return array
     */
    public function setPurpose($channel, $purpose)
    {
        return $this->method('setPurpose', compact($channel, $purpose));
    }

    /**
     * This method is used to change the topic of a channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/channels.setTopic
     *
     * @param string $channel
     * @param string $topic
     *
     * @return array
     */
    public function setTopic($channel, $topic)
    {
        return $this->method('setPurpose', compact($channel, $topic));
    }

    /**
     * This method unarchives a channel. The calling user is added to the channel.
     *
     * @see https://api.slack.com/methods/channels.unarchive
     *
     * @param string $channel Channel to unarchive
     *
     * @return array
     */
    public function unarchive($channel)
    {
        return $this->method('unarchive', compact($channel));
    }
}
