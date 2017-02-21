<?php
namespace MrModule\Profile;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class ProfileServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $moduleManager->add('profile', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}