<?php
namespace MrModule\LocalAdmin;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class LocalAdminServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
        $moduleManager->add('localadmin', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }

    public function register() {
        $this->app->bind('MrModule\LocalAdmin\CheckInHandler', function ($app) {
            return new CheckInHandler();
        });

        $this->app->tag('MrModule\LocalAdmin\CheckInHandler', 'checkin');
    }
}