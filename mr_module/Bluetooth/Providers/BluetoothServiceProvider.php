<?php
namespace MrModule\Bluetooth\Providers;


use Illuminate\Support\ServiceProvider;

class BluetoothServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'bluetooth');
    }
}