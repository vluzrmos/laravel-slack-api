<?php namespace Vluzrmos\SlackApi;

use Illuminate\Support\ServiceProvider;

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
    $this->app->bind('slackapi', function(){
      $client = new \GuzzleHttp\Client;
      $verify_path = config('services.slack.ssl_verify');

      if(!empty($verify_path) and file_exists($verify_path)){
        $client->setDefaultOption('verify', $verify_path);
      }

      return new \Vluzrmos\SlackApi\SlackApi($client, config('services.slack.token'));
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
