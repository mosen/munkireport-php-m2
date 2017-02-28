<?php
namespace MrModule\SCCMStatus;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class SCCMStatusServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('sccm_status', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}