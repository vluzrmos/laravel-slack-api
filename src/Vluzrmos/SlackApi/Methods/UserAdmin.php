<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackUserAdmin;

class UserAdmin extends SlackMethod implements SlackUserAdmin
{
    protected $methodsGroup = 'users.admin.';

    /**
     * Invite a new user for a team.
     * @param string $email email of the new user
     * @param array  $options ['first_name' => 'John', 'last_name' => 'Doe', 'channels' => 'ch1,ch2,ch3 ...']
     *
     * @return array
     */
    public function invite($email, $options = [])
    {
        return $this->method('invite', array_merge([
            'email' => $email,
            '_attempts' => 1,
        ], $options));
    }

    /**
     * Set a user account as inactive.
     * @param string $user The user to set as inactive.
     *
     * @return array
     */
    public function setInactive($user = null){
        return $this->method('setInactive', [
            'user' => $user,
            'set_active' => true,
            '_attempts' => 1,
        ]);
    }

    /**
     * Set a user account as regular.
     * @param string $user The user to set as regular.
     *
     * @return array
     */
    public function setRegular($user = null){
        return $this->method('setRegular', [
            'user' => $user,
            'set_active' => true,
            '_attempts' => 1,
        ]);
    }

    /**
     * Set a user account as admin.
     * @param string $user The user to set as admin.
     *
     * @return array
     */
    public function setAdmin($user = null){
        return $this->method('setAdmin', [
            'user' => $user,
            'set_active' => true,
            '_attempts' => 1,
        ]);
    }
}
