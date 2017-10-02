<?php
namespace MrModule\InstallHistory;

use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class InstallHistoryServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('installhistory', __DIR__)
            ->installs('scripts/install.sh');
    }
}