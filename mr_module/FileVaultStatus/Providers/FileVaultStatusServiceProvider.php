<?php
namespace MrModule\FileVaultStatus\Providers;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class FileVaultStatusServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('filevault_status', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}