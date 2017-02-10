<?php
namespace MrModule\ManagedInstalls\Providers;


use Illuminate\Support\ServiceProvider;

class ManagedInstallsServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}