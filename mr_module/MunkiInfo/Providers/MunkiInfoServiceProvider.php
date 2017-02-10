<?php
namespace MrModule\MunkiInfo\Providers;


use Illuminate\Support\ServiceProvider;

class MunkiInfoServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}