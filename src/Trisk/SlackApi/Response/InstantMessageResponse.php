<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class InstantMessageResponse
 *
 * @package Trisk\SlackApi\Response
 */
class InstantMessageResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $ims;

    /**
     * SlackResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setIms($this->arrayGet($response, 'ims', []));
    }

    /**
     * @return Collection
     */
    public function ims(): Collection
    {
        return $this->ims;
    }

    /**
     * @param array $ims
     *
     * @return SlackResponse
     */
    private function setIms(array $ims): SlackResponse
    {
        $this->ims = collect($ims);

        return $this;
    }
}
