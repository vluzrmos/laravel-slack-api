<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\TeamContract;
use Trisk\SlackApi\Response\TeamResponse;

/**
 * Class Team
 *
 * @package Trisk\SlackApi\Methods
 */
class Team extends SlackMethod implements TeamContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'team.';

    /**
     * @inheritdoc
     */
    public function info(): TeamResponse
    {
        return $this->arrayToResponse($this->method('info'));
    }

    /**
     * @inheritdoc
     */
    public function accessLogs(array $options = []): TeamResponse
    {
        return $this->arrayToResponse($this->method('accessLogs', $options));
    }

    /**
     * @param array $response
     *
     * @return TeamResponse
     */
    private function arrayToResponse(array $response): TeamResponse
    {
        return new TeamResponse($response);
    }
}
