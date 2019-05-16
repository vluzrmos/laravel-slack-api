<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\UserAdminContract;
use Trisk\SlackApi\Response\SlackResponse;

/**
 * Class UserAdmin
 *
 * @package Trisk\SlackApi\Methods
 */
class UserAdmin extends SlackMethod implements UserAdminContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'users.admin.';

    /**
     * @inheritdoc
     */
    public function invite(string $email, array $options = []): SlackResponse
    {
        return $this->method('invite', array_merge([
            'email' => $email,
            '_attempts' => 1,
        ], $options));
    }

    /**
     * @inheritdoc
     */
    public function setRegular(?string $user = null): SlackResponse
    {
        return $this->method('setRegular', [
            'user' => $user,
            'set_active' => true,
            '_attempts' => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function setAdmin(?string $user = null): SlackResponse
    {
        return $this->method('setAdmin', [
            'user' => $user,
            'set_active' => true,
            '_attempts' => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function setInactive(?string $user = null): SlackResponse
    {
        return $this->method('setInactive', [
            'user' => $user,
            'set_active' => true,
            '_attempts' => 1,
        ]);
    }

    /**
     * @param array $response
     *
     * @return SlackResponse
     */
    private function arrayToResponse(array $response): SlackResponse
    {
        return new SlackResponse($response);
    }
}
