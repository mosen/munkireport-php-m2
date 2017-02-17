<?php
namespace MrModule\LocalAdmin\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class LocalAdminServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        
        $moduleManager->add('localadmin', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}