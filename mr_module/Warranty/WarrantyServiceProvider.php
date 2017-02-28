<?php
namespace MrModule\Warranty;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class WarrantyServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Warranty';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('warranty/listing', 'WarrantyController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('warranty', 'WarrantyController');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'warranty');
        $moduleManager->add('warranty', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}