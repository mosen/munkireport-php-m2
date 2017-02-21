<?php
namespace MrModule\FindMyMac;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class FindMyMacServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\FindMyMac';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/FindMyMac/routes.php'));
    }

    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->mapApiRoutes();

        $moduleManager->add('findmymac', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}