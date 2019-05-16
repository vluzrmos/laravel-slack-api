<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\SearchContract;
use Trisk\SlackApi\Response\SearchResponse;

/**
 * Class Search
 *
 * @package Trisk\SlackApi\Methods
 */
class Search extends SlackMethod implements SearchContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'search.';

    /**
     * @inheritdoc
     */
    public function all(string $query, string $sort, array $options = []): SearchResponse
    {
        return $this->arrayToResponse($this->method('all', array_merge(compact('query', 'sort'), $options)));
    }

    /**
     * @inheritdoc
     */
    public function files(string $query, string $sort, array $options = []): SearchResponse
    {
        return $this->arrayToResponse($this->method('files', array_merge(compact('query', 'sort'), $options)));
    }

    /**
     * @inheritdoc
     */
    public function messages(string $query, string $sort, array $options = []): SearchResponse
    {
        return $this->arrayToResponse($this->method('messages', array_merge(compact('query', 'sort'), $options)));
    }

    /**
     * @param array $response
     *
     * @return SearchResponse
     */
    private function arrayToResponse(array $response): SearchResponse
    {
        return new SearchResponse($response);
    }
}
