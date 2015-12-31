<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackSearch;

class Search extends SlackMethod implements SlackSearch
{
    protected $methodsGroup = 'search.';

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
     *@return array
     */
    public function all($query, $sort = 'timestamp', $options = [])
    {
        return $this->method('all', array_merge(compact('query', 'sort'), $options));
    }

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
     *</pre>
     *@return array
     */
    public function files($query, $sort = 'timestamp', $options = [])
    {
        return $this->method('files', array_merge(compact('query', 'sort'), $options));
    }

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
     *</pre>
     *@return array
     */
    public function messages($query, $sort = 'timestamp', $options = [])
    {
        return $this->method('messages', array_merge(compact('query', 'sort'), $options));
    }
}
