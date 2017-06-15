<?php
namespace MrModule\Wifi;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class WifiServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Wifi';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('wifi/listing', 'WifiController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('wifi', 'WifiController');
        });
    }
    
    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
        $moduleManager->add('wifi', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }

    public function register() {
        $this->app->bind('MrModule\Wifi\CheckInHandler', function ($app) {
            return new CheckInHandler();
        });

        $this->app->tag('MrModule\Wifi\CheckInHandler', 'checkin');
    }
}