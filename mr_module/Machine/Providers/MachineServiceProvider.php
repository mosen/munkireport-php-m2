<?php
namespace MrModule\Machine\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\Router;
use MrModule\Machine\CheckInHandler;

class MachineServiceProvider extends ServiceProvider
{
    public function boot(Router $checkInRouter) {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/machine')
        ], 'public');

        $checkInRouter->handle('machine', CheckInHandler::class);
    }

    public function registerCheckInHandler() {
        $this->app->singleton(CheckInHandler::class, function () {
            return new CheckInHandler;
        });
    }

    public function register() {
        $this->registerCheckInHandler();
    }
}