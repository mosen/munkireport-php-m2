<?php

namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\CheckIn\CheckInRouter;

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
            return new CheckInRouter();
        });

        $this->app->bind(
            'Mr\Contracts\CheckIn\CheckInRouter',
            'Mr\CheckIn\CheckInRouter'
        );
    }
}
