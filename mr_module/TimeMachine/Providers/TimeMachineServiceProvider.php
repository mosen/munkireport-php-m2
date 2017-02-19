<?php
namespace MrModule\TimeMachine\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class TimeMachineServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\TimeMachine';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/TimeMachine/routes.php'));
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

    }
}
