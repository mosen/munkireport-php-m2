<?php
namespace MrModule\Printer;

use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class PrinterServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('printer', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}