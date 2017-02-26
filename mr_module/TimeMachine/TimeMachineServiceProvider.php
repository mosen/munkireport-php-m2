<?php
namespace MrModule\TimeMachine;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class TimeMachineServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\TimeMachine';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('timemachine/listing', 'TimeMachineController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('timemachine', 'TimeMachineController');
            Route::get('stats/timemachine', 'TimeMachineController@stats');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('timemachine', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}
