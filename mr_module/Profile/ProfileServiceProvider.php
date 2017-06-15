<?php
namespace MrModule\Profile;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class ProfileServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('profile', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }

    public function register() {
        $this->app->bind('MrModule\Profile\CheckInHandler', function ($app) {
            return new CheckInHandler();
        });

        $this->app->tag('MrModule\Profile\CheckInHandler', 'checkin');
    }
}