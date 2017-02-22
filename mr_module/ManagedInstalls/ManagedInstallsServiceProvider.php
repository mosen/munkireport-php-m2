<?php
namespace MrModule\ManagedInstalls;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class ManagedInstallsServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('managedinstalls', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}