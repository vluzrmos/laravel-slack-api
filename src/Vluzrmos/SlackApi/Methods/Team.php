<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackTeam;

class Team extends SlackMethod implements SlackTeam
{
    protected $methodsGroup = 'team.';

    /**
     * This method provides information about your team.
     *
     * @return array
     */
    public function info()
    {
        return $this->method('info');
    }

    /**
     * This method is used to get the access logs for users on a team.
     *
     * @param array $options ['count' => 100, 'page' => 1]
     *
     * @return array
     */
    public function accessLogs($options = [])
    {
        return $this->method('accessLogs', $options);
    }
}
