<?php namespace Vluzrmos\SlackApi;

use Illuminate\Support\Facades\Facade;

class SlackApiFacade extends Facade{

  protected static function getFacadeAccessor(){
    return 'slackapi';
  }
}
