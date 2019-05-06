<?php

namespace Trisk\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackGroup extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.group';
  }
}
