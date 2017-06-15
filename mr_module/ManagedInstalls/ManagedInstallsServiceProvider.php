<?php
namespace MrModule\ManagedInstalls;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class ManagedInstallsServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('managedinstalls', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }

    public function register() {
        $this->app->bind('MrModule\ManagedInstalls\CheckInHandler', function ($app) {
            return new CheckInHandler();
        });

        $this->app->tag('MrModule\ManagedInstalls\CheckInHandler', 'checkin');
    }
}