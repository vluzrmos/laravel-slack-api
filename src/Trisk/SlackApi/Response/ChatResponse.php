<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class ChatResponse
 *
 * @package Trisk\SlackApi\Response
 */
class ChatResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $message;

    /**
     * ChatResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setMessage($this->arrayGet($response, 'message', []));
    }

    /**
     * @return Collection
     */
    public function message(): Collection
    {
        return $this->message;
    }

    /**
     * @param array $message
     *
     * @return ChatResponse
     */
    private function setMessage(array $message): ChatResponse
    {
        $this->message = collect($message);

        return $this;
    }
}
