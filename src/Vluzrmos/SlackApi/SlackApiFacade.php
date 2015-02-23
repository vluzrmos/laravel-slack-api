<?php namespace Vluzrmos\SlackApi;

use Illuminate\Support\Facades\Facade;

class SlackApiFacade extends Facade{

  /**
   * @return string
   */
  protected static function getFacadeAccessor(){
    return 'slackapi';
  }
}
