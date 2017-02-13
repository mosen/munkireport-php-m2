<?php
namespace MrModule\Machine\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\Router;
use MrModule\Machine\CheckInHandler;
use Illuminate\Support\Facades\Route;

class MachineServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Machine';

    public function boot(Router $checkInRouter) {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/machine')
        ], 'public');

        $checkInRouter->handle('machine', CheckInHandler::class);
    }

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Machine/routes.php'));
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