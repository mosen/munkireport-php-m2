<?php
namespace MrModule\Power;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class PowerServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Power';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('power/listing', 'PowerController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('power', 'PowerController');
        });
    }
    
    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'power');

        $moduleManager->add('power', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}