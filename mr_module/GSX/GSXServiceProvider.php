<?php
namespace MrModule\GSX;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class GSXServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('gsx', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}