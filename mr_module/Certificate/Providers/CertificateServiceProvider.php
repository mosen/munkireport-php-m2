<?php
namespace MrModule\Certificate\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Contracts\CheckIn\CheckInRouter;
use MrModule\Certificate\CheckInHandler;

class CertificateServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Certificate';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Certificate/routes.php'));
    }

    public function boot(CheckInRouter $router) {
        $this->publishes([
            __DIR__.'/../config/mr_certificate.php' => config_path('mr_certificate.php')
        ], 'config');
        
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $router->addHandler('certificate', CheckInHandler::class);
    }
}