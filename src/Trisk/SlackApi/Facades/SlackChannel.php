<?php

namespace Trisk\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackChannel extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.channel';
  }
}
