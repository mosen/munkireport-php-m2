<?php
namespace MrModule\Display\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DisplayServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Display';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Display/routes.php'));
    }

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/mr_displays.php' => config_path('mr_displays.php')
        ], 'config');

        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}