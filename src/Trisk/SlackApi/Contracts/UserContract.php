<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\UserResponse;

/**
 * Interface UserContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface UserContract
{
    /**
     * This method returns information about a team member.
     *
     * @param string $user User to get info on
     *
     * @return UserResponse
     */
    public function info(string $user): UserResponse;

    /**
     * This method returns a list of all users in the team. This includes deleted/deactivated users.
     *
     * @return UserResponse
     */
    public function lists(): UserResponse;

    /**
     * Alias to lists.
     *
     * @return UserResponse
     */
    public function all(): UserResponse;

    /**
     * This method lets the slack messaging server know that the authenticated user is currently active.
     * Consult the presence documentation for more details.
     *
     * @return UserResponse
     */
    public function setActive(): UserResponse;

    /**
     * This method lets you set the calling user's manual presence.
     * Consult the presence documentation for more details.
     *
     * @param string $presence
     *
     * @return UserResponse
     */
    public function setPresence(string $presence): UserResponse;

    /**
     * This method lets you find out information about a user's presence.
     * Consult the presence documentation for more details.
     *
     * @param string $user User ID to get presence info on. Defaults to the authed user.
     *
     * @return UserResponse
     */
    public function getPresence(string $user): UserResponse;
}
