<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class StarResponse
 *
 * @package Trisk\SlackApi\Response
 */
class StarResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $items;

    /**
     * StarResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setItems($this->arrayGet($response, 'items', []));
    }

    /**
     * @return Collection
     */
    public function items(): Collection
    {
        return $this->items;
    }

    /**
     * @param array $items
     *
     * @return StarResponse
     */
    private function setItems(array $items): StarResponse
    {
        $this->items = collect($items);

        return $this;
    }
}
