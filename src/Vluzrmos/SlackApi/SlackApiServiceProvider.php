<?php namespace Vluzrmos\SlackApi;

use Illuminate\Support\ServiceProvider;
use Vluzrmos\SlackApi\SlackApi;

class SlackApiServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
    $this->app->singleton('slackapi', function(){
      $api = new SlackApi(null, config('services.slack.token'));


      $verify_path = config('services.slack.ssl_verify');

      if(!empty($verify_path) and file_exists($verify_path)){
        $api->setSSLVerifyPath($verify_path);
      }

      return $api;
    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['slackapi'];
	}

}
