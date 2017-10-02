<?php
namespace MrModule\Location;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class LocationServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('location', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}