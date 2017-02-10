<?php
namespace MrModule\DeployStudio\Providers;


use Illuminate\Support\ServiceProvider;

class DeployStudioServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}