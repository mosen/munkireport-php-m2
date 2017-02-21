<?php
namespace MrModule\Backup2Go;

use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

use Illuminate\Support\Facades\Route;

class Backup2GoServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Backup2Go';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Backup2Go/routes.php'));
    }

    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->mapApiRoutes();

        $moduleManager->add('backup2go', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}