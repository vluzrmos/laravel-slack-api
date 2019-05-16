<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\TeamResponse;

/**
 * Interface TeamContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface TeamContract
{
    /**
     * @return TeamResponse
     */
    public function info(): TeamResponse;

    /**
     * This method is used to get the access logs for users on a team.
     *
     * @param array $options ['count' => 100, 'page' => 1]
     *
     * @return TeamResponse
     */
    public function accessLogs(array $options = []): TeamResponse;
}
