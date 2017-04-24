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
        //require __DIR__ . '/../vendor/autoload.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register package events
        $this->app->singleton('Client', function($app){
            return new Baytree\Slack\Client(new \GuzzleHttp\Client);
        });
    }
}
