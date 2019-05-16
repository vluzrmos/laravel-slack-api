<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\ChannelResponse;

/**
 * Interface ChannelContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface ChannelContract
{
    /**
     * @param string $channel
     *
     * @return ChannelResponse
     */
    public function archive(string $channel): ChannelResponse;

    /**
     * This method unarchives a channel. The calling user is added to the channel.
     *
     * @see https://api.slack.com/methods/channels.unarchive
     *
     * @param $channel
     *
     * @return ChannelResponse
     */
    public function restore(string $channel): ChannelResponse;

    /**
     * This method crate a channel with a given name.
     *
     * @param $name
     *
     * @return ChannelResponse
     */
    public function create(string $name): ChannelResponse;

    /**
     * This method returns a portion of messages/events from the specified channel.
     * To read the entire history for a channel, call the method with no `latest` or `oldest` arguments,
     * and then continue paging using the instructions below.
     * @see https://api.slack.com/methods/channels.history
     *
     * @param string      $channel
     * @param int         $count
     * @param string|null $latest
     * @param int         $oldest
     * @param int         $inclusive
     *
     * @return ChannelResponse
     */
    public function history(string $channel, int $count = 100, string $latest = null, int $oldest = 0, int $inclusive = 1): ChannelResponse;

    /**
     * This method returns information about a team channel.
     *
     * @see https://api.slack.com/methods/channels.info
     *
     * @param string $channel
     *
     * @return ChannelResponse
     */
    public function info(string $channel): ChannelResponse;

    /**

     * This method is used to invite a user to a channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/channels.invite
     *
     * @param string $channel
     * @param string $user
     *
     * @return ChannelResponse
     */
    public function invite(string $channel, string $user): ChannelResponse;

    /**
     * This method is used to join a channel. If the channel does not exist, it is created.
     *
     * @see https://api.slack.com/methods/channels.join
     *
     * @param string $name
     *
     * @return ChannelResponse
     */
    public function join(string $name): ChannelResponse;

    /**
     * This method allows a user to remove another member from a team channel.
     *
     * @see https://api.slack.com/methods/channels.kick
     *
     * @param string $channel
     * @param string $user
     *
     * @return ChannelResponse
     */
    public function kick(string $channel, string $user): ChannelResponse;

    /**
     * This method is used to leave a channel.
     *
     * @see https://api.slack.com/methods/channels.leave
     *
     * @param string $channel
     *
     * @return ChannelResponse
     */
    public function leave(string $channel): ChannelResponse;

    /**
     * This method returns a list of all channels in the team. This includes channels the caller is in, channels they are not currently in, and archived channels.
     * The number of (non-deactivated) members in each channel is also returned.
     *
     * @see https://api.slack.com/methods/channels.list
     *
     * @param int $exclude_archived
     *
     * @return ChannelResponse
     */
    public function all(int $exclude_archived): ChannelResponse;

    /**
     * This method returns a list of all channels in the team. This includes channels the caller is in, channels they are not currently in, and archived channels.
     * The number of (non-deactivated) members in each channel is also returned.
     *
     * @see https://api.slack.com/methods/channels.list
     *
     * @param int $exclude_archived
     *
     * @return ChannelResponse
     */
    public function lists(int $exclude_archived): ChannelResponse;

    /**
     * This method moves the read cursor in a channel.
     *
     * @see https://api.slack.com/methods/channels.mark
     *
     * @param string $channel
     * @param string $ts
     *
     * @return ChannelResponse
     */
    public function mark(string $channel, string $ts): ChannelResponse;

    /**
     * This method renames a team channel.
     *
     * The only people who can rename a channel are team admins, or the person that originally
     * created the channel. Others will recieve a "not_authorized" error.
     *
     * @see https://api.slack.com/methods/channels.rename
     *
     * @param string $channel
     * @param string $name
     *
     * @return ChannelResponse
     */
    public function rename(string $channel, string $name): ChannelResponse;

    /**
     * This method is used to change the purpose of a channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/channels.setPurpose
     *
     * @param string $channel
     * @param string $purpose
     *
     * @return ChannelResponse
     */
    public function setPurpose(string $channel, string $purpose): ChannelResponse;

    /**
     * This method is used to change the topic of a channel. The calling user must be a member of the channel.
     *
     * @see https://api.slack.com/methods/channels.setTopic
     *
     * @param string $channel
     * @param string $topic
     *
     * @return ChannelResponse
     */
    public function setTopic(string $channel, string $topic): ChannelResponse;
}
