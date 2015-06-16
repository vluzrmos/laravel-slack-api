<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackSearch
{
    public function all($query, $sort, $options = []);
    public function files($query, $sort, $options = []);
    public function messages($query, $sort, $options = []);
}
