<?php
namespace MrModule\Power\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class PowerServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('power', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}