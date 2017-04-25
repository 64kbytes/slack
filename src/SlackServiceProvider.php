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
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        require __DIR__ . '/../vendor/autoload.php';
            
        // register package events
        $this->app->singleton('Slack', function($app){
            return new Baytree\Slack\Client(new \GuzzleHttp\Client);
        });
    
    }
}
