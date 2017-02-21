<?php
namespace MrModule\MunkiInfo;


use Illuminate\Support\ServiceProvider;
use Mr\Contracts\CheckIn\CheckInRouter;
use Mr\Module\ModuleManager;
use MrModule\MunkiInfo\CheckInHandler;

class MunkiInfoServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('munkiinfo', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}