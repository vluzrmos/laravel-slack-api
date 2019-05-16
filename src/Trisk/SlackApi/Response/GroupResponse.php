<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class GroupResponse
 *
 * @package Trisk\SlackApi\Response
 */
class GroupResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $channels;

    /**
     * SlackResponse constructor.
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
     * @return SlackResponse
     */
    private function setChannels(array $channels): SlackResponse
    {
        $this->channels = collect($channels);

        return $this;
    }
}
