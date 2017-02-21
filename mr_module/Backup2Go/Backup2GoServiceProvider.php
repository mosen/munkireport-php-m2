<?php
namespace MrModule\Backup2Go;

use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

use Illuminate\Support\Facades\Route;

class Backup2GoServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Backup2Go';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('backup2go', 'Backup2GoController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::get('backup2go/stats', 'Backup2GoController@stats');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->mapApiRoutes();
        $this->mapWebRoutes();

        $moduleManager->add('backup2go', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}