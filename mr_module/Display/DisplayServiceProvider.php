<?php
namespace MrModule\Display;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class DisplayServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Display';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('displays', 'DisplayController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('display', 'DisplayController');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->publishes([
            __DIR__.'/../config/mr_displays.php' => config_path('mr_displays.php')
        ], 'config');

        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('display', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}