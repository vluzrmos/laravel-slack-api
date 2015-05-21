<?php

namespace Vluzrmos\SlackApi;

use Illuminate\Support\ServiceProvider;

class SlackApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        /* Lumen autoload services configs */
        if (str_contains($this->app->version(), 'Lumen')) {
            $this->app->configure('services');
        }

        $this->app->singleton('slackapi', function () {
            $api = new SlackApi(null, config('services.slack.token'));

            return $api;
        });

        $this->app->singleton('Vluzrmos\SlackApi\Contracts\SlackApi', function () {
            return $this->app['slackapi'];
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['slackapi', 'Vluzrmos\SlackApi\Contracts\SlackApi'];
    }
}
