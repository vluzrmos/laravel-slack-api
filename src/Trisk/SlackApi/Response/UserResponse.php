<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class UserResponse
 *
 * @package Trisk\SlackApi\Response
 */
class UserResponse extends SlackResponse
{
    /**
     * @var bool
     */
    protected $ok;

    /**
     * @var null|string
     */
    protected $error;

    /**
     * @var Collection
     */
    protected $members;

    /**
     * @var Collection
     */
    protected $user;

    /**
     * UserResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setMembers($this->arrayGet($response, 'members', []))
            ->setUser($this->arrayGet($response, 'user', []));
    }

    /**
     * @return Collection
     */
    public function members(): Collection
    {
        return $this->members;
    }

    /**
     * @param array $members
     *
     * @return UserResponse
     */
    private function setMembers(array $members): UserResponse
    {
        $this->members = collect($members);

        return $this;
    }

    /**
     * @return Collection
     */
    public function user(): Collection
    {
        return $this->user;
    }

    /**
     * @param array $user
     *
     * @return UserResponse
     */
    private function setUser(array $user): UserResponse
    {
        $this->user = collect($user);

        return $this;
    }
}
