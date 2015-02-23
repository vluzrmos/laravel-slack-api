<?php namespace Vluzrmos\SlackApi;

use GuzzleHttp\Client;
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
    $this->app->bind('slackpi', function(){
      $client = new Client;
      $verify_path = $this->app->config('services.slack.ssl_verify');

      if(!empty($verify_path) and file_exists($verify_path)){
        $client->setDefaultOption('verify', $verify_path);
      }

      return new SlackApi($client, $this->app->config('services.slack.token'));
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
