<?php
namespace MrModule\DirectoryService\Providers;


use Illuminate\Support\ServiceProvider;

class DirectoryServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}