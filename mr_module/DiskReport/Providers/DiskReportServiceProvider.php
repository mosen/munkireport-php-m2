<?php
namespace MrModule\DiskReport\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DiskReportServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\DiskReport';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/DiskReport/routes.php'));
    }

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/mr_disk_report.php' => config_path('mr_disk_report.php')
        ], 'config');
        
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}