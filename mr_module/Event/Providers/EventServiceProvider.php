<?php
namespace MrModule\Display\Providers;


use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}