<?php
namespace MrModule\Bluetooth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Contracts\CheckIn\CheckInRouter;
use Mr\Module\ModuleManager;


class BluetoothServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Bluetooth';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('bluetooth/listing', 'BluetoothController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('bluetooth', 'BluetoothController');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('bluetooth', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');


        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    public function register() {
        $this->app->bind('MrModule\Bluetooth\CheckInHandler', function ($app) {
            return new CheckInHandler();
        });

        $this->app->tag('MrModule\Bluetooth\CheckInHandler', 'checkin');
    }
}