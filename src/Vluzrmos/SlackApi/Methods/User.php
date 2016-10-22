<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackUser;

class User extends SlackMethod implements SlackUser
{
    protected $methodsGroup = 'users.';

    /**
     * This method lets you find out information about a user's presence.
     * Consult the presence documentation for more details.
     *
     * @param string $user User ID to get presence info on. Defaults to the authed user.
     *
     * @return array
     */
    public function getPresence($user)
    {
        return $this->method('getPresence', compact('user'));
    }

    /**
     * This method returns information about a team member.
     *
     * @param string $user User to get info on
     *
     * @return array
     */
    public function info($user)
    {
        $user = $this->getUsersIDsByNicks($user);

        return $this->method('info', ['user' => isset($user[0]) ? $user[0]: null]);
    }

    /**
     * This method returns a list of all users in the team. This includes deleted/deactivated users.
     *
     * @return array
     */
    public function lists()
    {
        return $this->method('list');
    }

    /**
     * Alias to lists.
     *
     * @return array
     */
    public function all()
    {
        return $this->lists();
    }

    /**
     * This method lets the slack messaging server know that the authenticated user is currently active.
     * Consult the presence documentation for more details.
     *
     * @return array
     */
    public function setActive()
    {
        return $this->method('setActive');
    }

    /**
     * This method lets you set the calling user's manual presence.
     * Consult the presence documentation for more details.
     *
     * @param $presence
     *
     * @return array
     */
    public function setPresence($presence)
    {
        return $this->method('setPresence', compact('presence'));
    }

    /**
     * Get an array of users id's by nicks.
     *
     * @param string|array $nicks
     * @param bool         $force force to reload the users list
     *
     * @param int          $cacheMinutes Minutes or a Date to cache the results, default 1 minute
     *
     * @return array
     */
    public function getUsersIDsByNicks($nicks, $force = false,  $cacheMinutes = 1)
    {
        $users = $this->cacheGet('list');

        if (! $users || $force) {
            $users = $this->cachePut('list', $this->lists(), $cacheMinutes);
        }

        if (! is_array($nicks)) {
            $nicks = preg_split('/, ?/', $nicks);
        }

        $usersIds = [];

        foreach ($users->members as $user) {
            foreach ($nicks as $nick) {
                if ($this->isUserNick($user, $nick)) {
                    $usersIds[] = $user->id;
                } elseif ($this->isSlackbotNick($nick)) {
                    $usersIds[] = 'USLACKBOT';
                }
            }
        }

        return $usersIds;
    }

    /**
     * Verify if a given nick is for the user.
     *
     * @param array $user
     * @param string $nick
     *
     * @return bool
     */
    protected function isUserNick($user, $nick)
    {
        $nick = str_replace('@', '', $nick);

        return $nick == $user->name || $nick == $user->id;
    }

    /**
     * Check if a given nick is for the slackbot.
     *
     * @param string $nick
     *
     * @return bool
     */
    protected function isSlackbotNick($nick)
    {
        return $nick == 'slackbot' or $nick == '@slackbot' or $nick == 'USLACKBOT';
    }
}
