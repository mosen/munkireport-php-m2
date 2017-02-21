<?php
namespace MrModule\GSX;


use Illuminate\Support\ServiceProvider;

class GSXServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}