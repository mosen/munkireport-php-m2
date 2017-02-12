<?php
namespace MrModule\Bluetooth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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

    public function boot() {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}