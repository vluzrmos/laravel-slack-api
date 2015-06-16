<?php

namespace Vluzrmos\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackFile extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.file';
  }
}
