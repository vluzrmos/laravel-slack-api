<?php

namespace Trisk\SlackApi\Contracts;

/**
 * Interface ApiContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface ApiContract
{
    /**
     * @param string $apiMethod
     * @param array  $parameters
     *
     * @return array
     */
    public function get(string $apiMethod, array $parameters = []): array;

    /**
     * @param string $apiMethod
     * @param array  $parameters
     *
     * @return array
     */
    public function post(string $apiMethod, array $parameters = []): array;

    /**
     * @param string $apiMethod
     * @param array  $parameters
     *
     * @return array
     */
    public function delete(string $apiMethod, array $parameters = []): array;

    /**
     * @param string $apiMethod
     * @param array  $parameters
     *
     * @return array
     */
    public function put(string $apiMethod, array $parameters = []): array;

    /**
     * @param string $apiMethod
     * @param array  $parameters
     *
     * @return array
     */
    public function patch(string $apiMethod, array $parameters = []): array;
}
