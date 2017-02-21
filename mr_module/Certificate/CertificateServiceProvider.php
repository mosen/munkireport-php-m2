<?php
namespace MrModule\Certificate;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

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

    public function boot(ModuleManager $moduleManager) {
        $this->publishes([
            __DIR__.'/../config/mr_certificate.php' => config_path('mr_certificate.php')
        ], 'config');
        
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('certificate', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}