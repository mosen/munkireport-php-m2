<?php
namespace MrModule\MunkiReport;

use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\CheckInRouter;
use Mr\Module\ModuleManager;
use MrModule\MunkiReport\CheckInHandler;

class MunkiReportServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('munkireport', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}