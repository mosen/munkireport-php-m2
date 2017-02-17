<?php

namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class ModuleManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Mr\Module\ModuleManager', function ($app) {
            return new ModuleManager();
        });
    }
}
