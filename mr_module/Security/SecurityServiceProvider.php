<?php
namespace MrModule\Security;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class SecurityServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('security', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}