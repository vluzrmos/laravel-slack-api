<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\StarResponse;

/**
 * Interface StarContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface StarContract
{
    /**
     * This method lists the items starred by a user.
     *
     * @param string|null $user Show stars by this user. Defaults to the authed user
     * @param array  $options ['count' => 100, 'page' = 1]
     *
     * @return StarResponse
     */
    public function lists(?string $user = null, array $options = []): StarResponse;

    /**
     * Alias to lists.
     *
     * @param string|null  $user Show stars by this user. Defaults to the authed user
     * @param array $options ['count' => 100, 'page' = 1]
     *
     * @return StarResponse
     */
    public function all(?string $user = null, array $options = []): StarResponse;
}
