<?php

namespace Vluzrmos\SlackApi\Contracts;


interface SlackUserAdmin
{
	public function invite($email, $options = []);
}
