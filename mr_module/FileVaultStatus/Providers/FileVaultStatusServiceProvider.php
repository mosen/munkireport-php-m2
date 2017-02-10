<?php
namespace MrModule\FileVaultStatus\Providers;


use Illuminate\Support\ServiceProvider;

class FileVaultStatusServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}