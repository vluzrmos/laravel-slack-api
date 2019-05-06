<?php

namespace Provectus\SlackApi\Facades;

use Illuminate\Support\Facades\Facade;

class SlackSearch extends Facade
{
    /**
   * @return string
   */
  protected static function getFacadeAccessor()
  {
      return 'slack.search';
  }
}
