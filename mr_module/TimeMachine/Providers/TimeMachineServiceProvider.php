<?php
namespace MrModule\TimeMachine\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class TimeMachineServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('timemachine', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}