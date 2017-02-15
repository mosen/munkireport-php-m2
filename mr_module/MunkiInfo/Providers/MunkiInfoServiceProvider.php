<?php
namespace MrModule\MunkiInfo\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\CheckInRouter;
use MrModule\MunkiInfo\CheckInHandler;

class MunkiInfoServiceProvider extends ServiceProvider
{
    public function boot(CheckInRouter $router) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $router->addHandler('munkiinfo', CheckInHandler::class);
    }
}