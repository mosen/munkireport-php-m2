<?php
namespace MrModule\Certificate\Providers;


use Illuminate\Support\ServiceProvider;

class CertificateServiceProvider extends ServiceProvider
{
    public function boot() {
        // Load Certificate Routes
        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        // If we have our own configuration publish it:
        $this->publishes([
            __DIR__.'/../config/certificate.php'
        ]);

        // If we have public assets
        $this->publishes([
            __DIR__.'/../assets' => public_path('vendor/certificate')
        ], 'public');

        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'certificate');
    }
}