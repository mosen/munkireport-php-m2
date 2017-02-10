<?php
namespace MrModule\DiskReport\Providers;


use Illuminate\Support\ServiceProvider;

class DiskReportServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}