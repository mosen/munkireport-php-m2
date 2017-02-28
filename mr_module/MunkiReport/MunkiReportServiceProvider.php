<?php
namespace MrModule\MunkiReport;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\CheckInRouter;
use Mr\Module\ModuleManager;
use MrModule\MunkiReport\CheckInHandler;

class MunkiReportServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\MunkiReport';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('munkireport/listing', 'MunkiReportController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('munkireport', 'MunkiReportController');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'munkireport');

        $moduleManager->add('munkireport', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}