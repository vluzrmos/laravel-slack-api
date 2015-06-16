<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackUserAdmin;

class UserAdmin extends SlackMethod implements SlackUserAdmin
{
    protected $methodsGroup = "users.admin.";

    /**
     * Invite a new user for a team
     * @param string $email email of the new user
     * @param array  $options ['first_name' => 'John', 'last_name' => 'Doe', 'channels' => 'ch1,ch2,ch3 ...']
     *
     * @return array
     */
    public function invite($email, $options = [])
    {
        return $this->method('invite', array_merge([
            'email' => $email,
            '_attempts' => 1
        ], $options));
    }
}
