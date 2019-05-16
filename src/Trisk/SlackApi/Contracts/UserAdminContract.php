<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\SlackResponse;

/**
 * Interface UserAdminContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface UserAdminContract
{
    /**
     * Invite a new user for a team.
     * @param string $email email of the new user
     * @param array  $options ['first_name' => 'John', 'last_name' => 'Doe', 'channels' => 'ch1,ch2,ch3 ...']
     *
     * @return SlackResponse
     */
    public function invite(string $email, array $options = []): SlackResponse;

    /**
     * Set a user account as regular.
     *
     * @param string|null $user The user to set as regular.
     *
     * @return SlackResponse
     */
    public function setRegular(?string $user = null): SlackResponse;

    /**
     * Set a user account as admin.
     * @param string|null $user The user to set as admin.
     *
     * @return SlackResponse
     */
    public function setAdmin(?string $user = null): SlackResponse;

    /**
     * Set a user account as inactive.
     * @param string|null $user The user to set as inactive.
     *
     * @return SlackResponse
     */
    public function setInactive(?string $user = null): SlackResponse;
}
