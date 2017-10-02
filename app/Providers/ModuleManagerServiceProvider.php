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
        $this->publishes([
            __DIR__.'/../config/mr_modules.php' => config_path('mr_modules.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ModuleManager::class, function ($app) {
            return new ModuleManager($app->tagged('modules'));
        });
    }
}
