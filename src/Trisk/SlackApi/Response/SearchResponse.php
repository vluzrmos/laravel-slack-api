<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class SearchResponse
 *
 * @package Trisk\SlackApi\Response
 */
class SearchResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $messages;

    /**
     * @var Collection
     */
    protected $posts;

    /**
     * SlackResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setMessages($this->arrayGet($response, 'messages', []))
            ->setPosts($this->arrayGet($response, 'posts', []));
    }

    /**
     * @param array $messages
     *
     * @return SearchResponse
     */
    private function setMessages(array $messages): SearchResponse
    {
        $this->messages = collect($messages);

        return $this;
    }

    /**
     * @param array $posts
     *
     * @return SearchResponse
     */
    private function setPosts(array $posts): SearchResponse
    {
        $this->posts = collect($posts);

        return $this;
    }
}
