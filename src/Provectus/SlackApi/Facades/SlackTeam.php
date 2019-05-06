<?php

namespace Provectus\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackTeam extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.team';
  }
}
