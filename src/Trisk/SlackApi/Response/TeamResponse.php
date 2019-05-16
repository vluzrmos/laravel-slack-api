<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class TeamResponse
 *
 * @package Trisk\SlackApi\Response
 */
class TeamResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $team;

    /**
     * SlackResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setTeam($this->arrayGet($response, 'team', []));
    }

    /**
     * @return Collection
     */
    public function team(): Collection
    {
        return $this->team;
    }

    /**
     * @param array $team
     *
     * @return SlackResponse
     */
    private function setTeam(array $team): SlackResponse
    {
        $this->team = collect($team);

        return $this;
    }
}
