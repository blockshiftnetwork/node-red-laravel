<?php

namespace NodeRed;

use NodeRed\NodeRed;
use Illuminate\Support\ServiceProvider;

class NodeRedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //  
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'node-red');

        // Register the main class to use with the facade
        $this->app->singleton('NodeRed', function () {
            return new NodeRed;
        });
    }
}
