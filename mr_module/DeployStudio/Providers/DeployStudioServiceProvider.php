<?php
namespace MrModule\DeployStudio\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DeployStudioServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\DeployStudio';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/DeployStudio/routes.php'));
    }

    public function boot() {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}