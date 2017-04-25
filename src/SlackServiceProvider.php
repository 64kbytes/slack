<?php

namespace Baytree\Slack;

use Illuminate\Support\ServiceProvider;

class SlackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // 'https://hooks.slack.com/services/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'
        $this->publishes([
            __DIR__ . '/config' => config_path('slack'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        //require __DIR__ . '/../vendor/autoload.php';
            
        // register package events
        $this->app->singleton('Slack', function($app){
            return new Baytree\Slack\Client(new \GuzzleHttp\Client);
        });
    
    }
}
