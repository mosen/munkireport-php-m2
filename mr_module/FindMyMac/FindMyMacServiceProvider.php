<?php
namespace MrModule\FindMyMac;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class FindMyMacServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\FindMyMac';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('findmymacs', 'FindMyMacController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('findmymac', 'FindMyMacController');
            Route::get('stats/findmymac', 'FindMyMacController@stats');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->mapApiRoutes();
        $this->mapWebRoutes();

        $moduleManager->add('findmymac', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}