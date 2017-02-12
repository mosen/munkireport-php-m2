<?php
namespace MrModule\Certificate\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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

    public function boot() {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}