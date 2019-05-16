<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\SearchResponse;

/**
 * Interface SlackSearch
 *
 * @package Trisk\SlackApi\Contracts
 */
interface SearchContract
{
    /**
     * This method allows you to search both messages and files in a single call.
     *
     * @param string $query
     * @param string $sort
     * @param array  $options <pre>
     * [
     *	 "sort_dir" => desc, //Change sort direction to ascending (asc) or descending (desc).
     *   "highlight" => 1, //Pass a value of 1 to enable query highlight markers (see below).
     *   "count" => 100, //Number of items to return per page.
     *   "page" => 1 //Page number of results to return.
     * ]
     *</pre>
     * @return SearchResponse
     */
    public function all(string $query, string $sort, array $options = []): SearchResponse;

    /**
     * This method returns files matching a search query.
     *
     * @param string $query
     * @param string $sort
     * @param array  $options <pre>
     * [
     *	 "sort_dir" => desc, //Change sort direction to ascending (asc) or descending (desc).
     *   "highlight" => 1, //Pass a value of 1 to enable query highlight markers (see below).
     *   "count" => 100, //Number of items to return per page.
     *   "page" => 1 //Page number of results to return.
     * ]
     * </pre>
     * @return SearchResponse
     */
    public function files(string $query, string $sort, array $options = []): SearchResponse;

    /**
     * This method returns messages matching a search query.
     *
     * @param string $query
     * @param string $sort
     * @param array  $options <pre>
     * [
     *	 "sort_dir" => desc, //Change sort direction to ascending (asc) or descending (desc).
     *   "highlight" => 1, //Pass a value of 1 to enable query highlight markers (see below).
     *   "count" => 100, //Number of items to return per page.
     *   "page" => 1 //Page number of results to return.
     * ]
     * </pre>
     * @return SearchResponse
     */
    public function messages(string $query, string $sort, array $options = []): SearchResponse;
}
