<?php
namespace MrModule\Inventory;


use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class InventoryServiceProvider extends ServiceProvider
{
    public function boot(ModuleManager $moduleManager) {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $moduleManager->add('inventory', __DIR__)
            ->installs('scripts/install.sh');
    }
}