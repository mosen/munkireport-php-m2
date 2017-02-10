<?php
namespace MrModule\Wifi\Providers;


use Illuminate\Support\ServiceProvider;

class WifiServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}