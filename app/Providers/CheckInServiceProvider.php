<?php

namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\CheckIn\CheckInRouter;
use Mr\CheckIn\MachineCheckInHandler;
use Mr\CheckIn\ReportDataCheckInHandler;

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
        $this->app->bind('Mr\CheckIn\ReportDataCheckInHandler', function ($app) {
            return new ReportDataCheckInHandler();
        });

        $this->app->bind('Mr\CheckIn\MachineCheckInHandler', function ($app) {
            return new MachineCheckInHandler();
        });

        $this->app->tag('Mr\CheckIn\ReportDataCheckInHandler', 'checkin');
        $this->app->tag('Mr\CheckIn\MachineCheckInHandler', 'checkin');



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
