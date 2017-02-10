<?php
namespace MrModule\Location\Providers;


use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}