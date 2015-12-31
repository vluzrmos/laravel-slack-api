<?php
/**
 * Created by PhpStorm.
 * User: vluzrmos
 * Date: 16/06/15
 * Time: 02:43.
 */
namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackStar;

class Star extends SlackMethod implements SlackStar
{
    protected $methodsGroup = 'stars.';

    /**
     * This method lists the items starred by a user.
     *
     * @param string $user Show stars by this user. Defaults to the authed user
     * @param array  $options ['count' => 100, 'page' = 1]
     *
     * @return array
     */
    public function lists($user = null, $options = [])
    {
        return $this->method('list', array_merge(['user' => $user], $options));
    }

    /**
     * Alias to lists.
     *
     * @param null  $user Show stars by this user. Defaults to the authed user
     * @param array $options ['count' => 100, 'page' = 1]
     *
     * @return array
     */
    public function all($user = null, $options = [])
    {
        return $this->lists($user, $options);
    }
}
