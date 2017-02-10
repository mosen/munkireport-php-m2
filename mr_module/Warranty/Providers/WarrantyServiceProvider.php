<?php
namespace MrModule\Warranty\Providers;


use Illuminate\Support\ServiceProvider;

class WarrantyServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}