<?php

namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\CheckIn\CheckInRouter;

class CheckInServiceProvider extends ServiceProvider
{
    protected $defer = true;
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Mr\CheckIn\CheckInRouter', function ($app) {
            return new CheckInRouter($app->tagged('checkin'));
        });

        $this->app->bind(
            'Mr\Contracts\CheckIn\CheckInRouter',
            'Mr\CheckIn\CheckInRouter'
        );
    }

    public function provides() {
        return [CheckInRouter::class];
    }
}
