<?php
namespace MrModule\Backup2Go\Providers;


use Illuminate\Support\ServiceProvider;

class Backup2GoServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}