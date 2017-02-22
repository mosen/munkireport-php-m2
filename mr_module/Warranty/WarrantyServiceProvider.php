<?php
namespace MrModule\Warranty;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class WarrantyServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('warranty', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}