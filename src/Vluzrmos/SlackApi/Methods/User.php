<?php

namespace Vluzrmos\SlackApi\Methods;


use Vluzrmos\SlackApi\Contracts\SlackUser;

class User extends AbstractMethod implements SlackUser
{

	protected $methodsGroup = "users.";

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
		return $this->method('info', compact('user'));
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
	 * Alias to lists
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
}
