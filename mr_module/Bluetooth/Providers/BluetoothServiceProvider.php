<?php
namespace MrModule\Bluetooth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Contracts\CheckIn\CheckInRouter;
use MrModule\Bluetooth\CheckInHandler;

class BluetoothServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Bluetooth';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Bluetooth/routes.php'));
    }

    public function boot(CheckInRouter $router) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $router->addHandler('bluetooth', CheckInHandler::class);
        $this->mapApiRoutes();
    }
}