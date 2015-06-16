<?php

namespace Vluzrmos\SlackApi\Contracts;

interface SlackChat
{
    public function delete($channel, $ts);
    public function message($channel, $text, $options = []);
    public function postMessage($channel, $text, $options = []);
    public function update($channel, $text, $ts);
}
