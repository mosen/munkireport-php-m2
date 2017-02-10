<?php
namespace MrModule\Network\Providers;


use Illuminate\Support\ServiceProvider;

class NetworkServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}