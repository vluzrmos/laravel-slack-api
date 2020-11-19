<?php

namespace Vluzrmos\SlackApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SlackApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Methods to register.
     * @var array
     */
    protected $methods = [
        'Channel',
        'Group',
        'Chat',
        'InstantMessage',
        'Search',
        'File',
        'User',
        'Team',
        'Star',
        'RealTimeMessage',
        'UserAdmin',
        'OAuth',
        'OAuthV2'
    ];

    /**
     * Default contracts namespace.
     * @var string
     */
    protected $contractsNamespace = 'Vluzrmos\SlackApi\Contracts';

    /**
     * Default methods namespace.
     * @var string
     */
    protected $methodsNamespace = 'Vluzrmos\SlackApi\Methods';

    /**
     * Default prefix of facade accessors.
     * @var string
     */
    protected $shortcutPrefix = 'slack.';

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/slack-api.php',
            'slack-api'
        );

        /* Lumen autoload services configs */
        if (Str::contains($this->app->version(), 'Lumen')) {
            $this->app->configure('services');
        }

        $this->app->singleton('Vluzrmos\SlackApi\Contracts\SlackApi', function () {
            $api = new SlackApi(null, config('services.slack.token'));

            return $api;
        });

        $this->app->alias('Vluzrmos\SlackApi\Contracts\SlackApi', 'slack.api');

        foreach ($this->methods as $method) {
            $this->registerSlackMethod($method);
        }

        $this->app->alias('Vluzrmos\SlackApi\Contracts\SlackInstantMessage', 'slack.im');

        $this->app->alias('Vluzrmos\SlackApi\Contracts\SlackRealTimeMessage', 'slack.rtm');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/slack-api.php' => config_path('slack-api.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['slack.api'];
    }

    public function registerSlackMethod($name)
    {
        $contract = Str::finish($this->contractsNamespace, '\\') . "Slack{$name}";
        $shortcut = $this->shortcutPrefix . Str::snake($name);
        $class = Str::finish($this->methodsNamespace, '\\') . $name;

        $this->registerSlackSingletons($contract, $class, $shortcut);
    }

    /**
     * @param $contract
     * @param $class
     * @param $shortcut
     */
    public function registerSlackSingletons($contract, $class, $shortcut = null)
    {
        $this->app->singleton($contract, function () use ($class) {
            return new $class($this->app['slack.api'], $this->app['cache.store']);
        });

        if ($shortcut) {
            $this->app->alias($contract, $shortcut);
        }
    }
}
