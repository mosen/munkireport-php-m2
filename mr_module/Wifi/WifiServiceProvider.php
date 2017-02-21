<?php
namespace MrModule\Wifi;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class WifiServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $moduleManager->add('wifi', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}