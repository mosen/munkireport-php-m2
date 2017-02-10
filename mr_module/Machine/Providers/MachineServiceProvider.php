<?php
namespace MrModule\Machine\Providers;


use Illuminate\Support\ServiceProvider;

class MachineServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}