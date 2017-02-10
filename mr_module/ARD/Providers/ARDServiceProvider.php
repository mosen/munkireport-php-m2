<?php
namespace MrModule\ARD\Providers;


use Illuminate\Support\ServiceProvider;

class ARDServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}