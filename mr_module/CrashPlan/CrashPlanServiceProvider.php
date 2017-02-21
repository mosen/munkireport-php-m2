<?php
namespace MrModule\CrashPlan;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

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

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

//        $moduleManager->add('crashplan', dirname(__DIR__))
//            ->installs('scripts/install.sh')
//            ->uninstalls('scripts/uninstall.sh');
    }
}