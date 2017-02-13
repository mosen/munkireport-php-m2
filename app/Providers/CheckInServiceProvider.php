<?php

namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\CheckIn\Router;

class CheckInServiceProvider extends ServiceProvider
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
        $this->app->singleton('Mr\CheckIn\CheckInRouter', function ($app) {
            return new Router();
        });

        $this->app->bind(
            'Mr\Contracts\CheckIn\Router',
            'Mr\CheckIn\CheckInRouter'
        );
    }
}
