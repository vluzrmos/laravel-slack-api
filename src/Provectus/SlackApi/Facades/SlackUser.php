<?php

namespace Provectus\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackUser extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.user';
  }
}
