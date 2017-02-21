<?php
namespace MrModule\Display;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class DisplayServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Display';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Display/routes.php'));
    }

    public function boot(ModuleManager $moduleManager) {
        $this->publishes([
            __DIR__.'/../config/mr_displays.php' => config_path('mr_displays.php')
        ], 'config');

        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('disk_report', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}