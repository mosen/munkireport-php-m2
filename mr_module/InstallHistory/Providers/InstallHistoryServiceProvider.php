<?php
namespace MrModule\InstallHistory\Providers;

use Illuminate\Support\ServiceProvider;

class InstallHistoryServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}