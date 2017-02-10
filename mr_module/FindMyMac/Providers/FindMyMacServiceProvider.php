<?php
namespace MrModule\FindMyMac\Providers;


use Illuminate\Support\ServiceProvider;

class FindMyMacServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}