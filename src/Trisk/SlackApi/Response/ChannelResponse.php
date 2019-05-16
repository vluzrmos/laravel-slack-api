<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class ChannelResponse
 *
 * @package Trisk\SlackApi\Response
 */

class ChannelResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $channels;

    /**
     * ChannelResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setChannels($this->arrayGet($response, 'channels', []));
    }

    /**
     * @return Collection
     */
    public function channels(): Collection
    {
        return $this->channels;
    }

    /**
     * @param array $channels
     *
     * @return ChannelResponse
     */
    private function setChannels(array $channels): ChannelResponse
    {
        $this->channels = collect($channels);

        return $this;
    }
}
