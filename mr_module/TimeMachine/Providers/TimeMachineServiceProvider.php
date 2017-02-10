<?php
namespace MrModule\TimeMachine\Providers;


use Illuminate\Support\ServiceProvider;

class TimeMachineServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}