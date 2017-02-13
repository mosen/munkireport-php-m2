<?php
namespace MrModule\Machine\Providers;


use Illuminate\Support\ServiceProvider;
use MrModule\Machine\CheckInHandler;

class MachineServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/machine')
        ], 'public');
    }

    public function register() {
        $router = $this->app['CheckInRouter'];
        $router->handle('machine', CheckInHandler::class);
    }
}