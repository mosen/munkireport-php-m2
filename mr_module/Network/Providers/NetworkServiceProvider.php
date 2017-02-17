<?php
namespace MrModule\Network\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class NetworkServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('network', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}