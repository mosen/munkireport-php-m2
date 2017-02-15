<?php
namespace MrModule\MunkiReport\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\CheckInRouter;
use MrModule\MunkiReport\CheckInHandler;

class MunkiReportServiceProvider extends ServiceProvider
{
    public function boot(CheckInRouter $router) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $router->addHandler('munkireport', CheckInHandler::class);
    }
}