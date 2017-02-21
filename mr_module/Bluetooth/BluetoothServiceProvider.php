<?php
namespace MrModule\Bluetooth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Mr\Contracts\CheckIn\CheckInRouter;
use Mr\Module\ModuleManager;
use MrModule\Bluetooth\CheckInHandler;

class BluetoothServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Bluetooth';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/Bluetooth/routes.php'));
    }

    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('bluetooth', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');


        $this->mapApiRoutes();
    }
}