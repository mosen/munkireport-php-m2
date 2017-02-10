<?php
namespace MrModule\MunkiReport\Providers;


use Illuminate\Support\ServiceProvider;

class MunkiReportServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}