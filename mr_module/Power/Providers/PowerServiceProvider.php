<?php
namespace MrModule\Power\Providers;


use Illuminate\Support\ServiceProvider;

class PowerServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}