<?php
namespace MrModule\CrashPlan\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CrashPlanServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\CrashPlan';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/CrashPlan/routes.php'));
    }

    public function boot() {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}