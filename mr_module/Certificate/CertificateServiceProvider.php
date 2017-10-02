<?php
namespace MrModule\Certificate;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class CertificateServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Certificate';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('certificate/listing', 'CertificateController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('certificate', 'CertificateController');
            Route::get('stats/certificate', 'CertificateController@stats');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->publishes([
            __DIR__.'/config/mr_certificate.php' => config_path('mr_certificate.php')
        ], 'config');
        
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('certificate', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }

}