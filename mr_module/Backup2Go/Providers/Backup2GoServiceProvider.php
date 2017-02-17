<?php
namespace MrModule\Backup2Go\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class Backup2GoServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'backup2go');

        $moduleManager->add('backup2go', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}