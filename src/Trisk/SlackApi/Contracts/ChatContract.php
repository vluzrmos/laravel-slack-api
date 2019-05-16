<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\ChatResponse;

/**
 * Interface ChatContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface ChatContract
{
    /**
     * This method deletes a message from a channel.
     *
     * @see https://api.slack.com/methods/chat.delete
     *
     * @param string     $channel Channel containing the message to be deleted.
     * @param string $ts      Timestamp of the message to be deleted.
     *
     *
     * @return ChatResponse
     */
    public function delete(string $channel, string $ts): ChatResponse;

    /**
     * This method posts a message to a channel.
     *
     * @see https://api.slack.com/methods/chat.postMessage
     *
     * @param string $channel Channel to send message to. Can be a public channel, private group or IM channel. Can be an encoded ID, or a name.
     * @param string $text Text of the message to send. See below for an explanation of formatting.
     * @param array $options
     *
     * @example
     * <pre>
     * [
     *    "username" => "My Bot", //Name of bot.
     *    "as_user"  => true, //Pass true to post the message as the authed user, instead of as a bot
     *    "parse"    => "full", //Change how messages are treated. See below.
     *    "link_names" => 1, //Find and link channel names and usernames.
     *    "attachments" => ["pretext" => "pre-hello", "text" => "text-world"], //Structured message attachments.
     *	  "unfurl_links" => true, //Pass true to enable unfurling of primarily text-based content.
     *    "unfurl_media" => true, //Pass false to disable unfurling of media content.
     *    "icon_url" => "http://lorempixel.com/48/48", //URL to an image to use as the icon for this message
     *    "icon_emoji"=> ":chart_with_upwards_trend:" //emoji to use as the icon for this message. Overrides icon_url.
     * ]
     *</pre>
     *
     * @return ChatResponse
     */
    public function message(string $channel, string $text, array $options = []): ChatResponse;

    /**
     * Alias to message().
     * @see https://api.slack.com/methods/chat.postMessage
     *
     * @param string $channel
     * @param string $text
     * @param array  $options
     *
     * @return ChatResponse
     */
    public function postMessage(string $channel, string $text, array $options = []): ChatResponse;

    /**
     * This method updates a message in a channel.
     *
     * @param string $channel
     * @param string $text
     * @param string $ts
     *
     * @return ChatResponse
     */
    public function update(string $channel, string $text, string $ts): ChatResponse;
}
