<?php

namespace Trisk\SlackApi\Methods;

use Illuminate\Support\Arr;
use Trisk\SlackApi\Contracts\UserContract;
use Trisk\SlackApi\Response\UserResponse;

/**
 * Class User
 *
 * @package Trisk\SlackApi\Methods
 */
class User extends SlackMethod implements UserContract
{
    const BOT_NAMES = [
        'slackbot',
        '@slackbot',
        'USLACKBOT',
    ];

    /**
     * @var string
     */
    protected $methodsGroup = 'users.';

    /**
     * @inheritdoc
     */
    public function info(string $user): UserResponse
    {
        $user = $this->_usersIDsByNicks($user);

        return $this->arrayToResponse($this->method('info', ['user' => isset($user[0]) ? $user[0]: null]));
    }

    /**
     * @inheritdoc
     */
    public function lists(): UserResponse
    {
        return $this->arrayToResponse($this->method('list'));
    }

    /**
     * @inheritdoc
     */
    public function all(): UserResponse
    {
        return $this->lists();
    }

    /**
     * @inheritdoc
     */
    public function setActive(): UserResponse
    {
        return $this->arrayToResponse($this->method('setActive'));
    }

    /**
     * @inheritdoc
     */
    public function setPresence(string $presence): UserResponse
    {
        return $this->arrayToResponse($this->method('setPresence', compact('presence')));
    }

    /**
     * @inheritdoc
     */
    public function getPresence(string $user): UserResponse
    {
        return $this->arrayToResponse($this->method('getPresence', compact('user')));
    }

    /**
     * TODO fix this
     *
     * Get an array of users id's by nicks.
     *
     * @param string|array $nicks
     * @param bool         $force force to reload the users list
     *
     * @param int          $cacheMinutes Minutes or a Date to cache the results, default 1 minute
     *
     * @return array
     */
    private function _usersIDsByNicks($nicks, $force = false,  $cacheMinutes = 1): array
    {
        $users = $this->cacheGet('list');

        /** @var UserResponse $users */
        if (! $users || $force) {
            $users = $this->cachePut('list', $this->lists(), $cacheMinutes);
        }
        if (! is_array($nicks)) {
            $nicks = preg_split('/, ?/', $nicks);
        }

        $usersIds = [];

        foreach ($users->members() as $user) {
            foreach ($nicks as $nick) {
                if ($this->isUserNick($user, $nick)) {
                    $usersIds[] = Arr::get($user, 'id');
                } elseif ($this->isSlackBotNick($nick)) {
                    $usersIds[] = 'USLACKBOT';
                }
            }
        }

        return array_filter($usersIds);
    }

    /**
     * Verify if a given nick is for the user.
     *
     * @param array $user
     * @param string $nick
     *
     * @return bool
     */
    protected function isUserNick(array $user, string $nick): bool
    {
        $nick = str_replace('@', '', $nick);

        return $nick == \Illuminate\Support\Arr::get($user, 'name') ||
            $nick == \Illuminate\Support\Arr::get($user, 'id');
    }

    /**
     * Check if a given nick is for the slackbot.
     *
     * @param string $nick
     *
     * @return bool
     */
    protected function isSlackBotNick(string $nick)
    {
        return in_array($nick, self::BOT_NAMES);
    }

    /**
     * @param array $response
     *
     * @return UserResponse
     */
    private function arrayToResponse(array $response): UserResponse
    {
        return new UserResponse($response);
    }
}
