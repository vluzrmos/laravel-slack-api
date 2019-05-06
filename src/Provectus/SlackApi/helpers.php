<?php

if (! function_exists('slack')) {

    /**
     * Helper to easy load an slack method or the api.
     * @param  string $method slack method name
     * @return \Provectus\SlackApi\Contracts|SlackApi|\Provectus\SlackApi\Methods\SlackMethod
     */
    function slack($method = null)
    {
        $slack = app('Provectus\SlackApi\Contracts\SlackApi');

        return $method ? $slack->load($method) : $slack;
    }
}
