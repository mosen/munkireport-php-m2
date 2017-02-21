<?php
namespace MrModule\CrashPlan;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class CrashPlanServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\CrashPlan';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('crashplans', 'CrashPlanController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('crashplan', 'CrashPlanController');
            Route::get('stats/crashplan', 'CrashPlanController@stats');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

//        $moduleManager->add('crashplan', dirname(__DIR__))
//            ->installs('scripts/install.sh')
//            ->uninstalls('scripts/uninstall.sh');
    }
}