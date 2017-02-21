<?php
namespace MrModule\DiskReport;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class DiskReportServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\DiskReport';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('diskreports', 'DiskReportController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('diskreport', 'DiskReportController');
            Route::get('stats/diskreport/free_space', 'DiskReportController@stats_free_space');
            Route::get('stats/diskreport/filevault_status', 'DiskReportController@stats_filevault_status');
            Route::get('stats/diskreport/smart_status', 'DiskReportController@stats_smart_status');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->publishes([
            __DIR__.'/config/mr_disk_report.php' => config_path('mr_disk_report.php')
        ], 'config');
        
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('displays_info', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}