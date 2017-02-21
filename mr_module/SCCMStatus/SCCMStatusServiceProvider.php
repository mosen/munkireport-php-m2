<?php
namespace MrModule\SCCMStatus;


use Illuminate\Support\ServiceProvider;

class SCCMStatusServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}