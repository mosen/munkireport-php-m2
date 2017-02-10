<?php
namespace MrModule\LocalAdmin\Providers;


use Illuminate\Support\ServiceProvider;

class LocalAdminServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}