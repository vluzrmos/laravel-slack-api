<?php

namespace Vluzrmos\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackApi extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.api';
  }
}
