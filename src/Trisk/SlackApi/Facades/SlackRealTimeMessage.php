<?php

namespace Trisk\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SlackRealTimeMessage
 *
 * @package Trisk\SlackApi\Facades
 * @deprecated
 */
class SlackRealTimeMessage extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.real_time_message';
  }
}
