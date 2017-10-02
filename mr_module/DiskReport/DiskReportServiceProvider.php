<?php
namespace MrModule\DiskReport;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class DiskReportServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\DiskReport';

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

        $moduleManager->add('disk_report', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}