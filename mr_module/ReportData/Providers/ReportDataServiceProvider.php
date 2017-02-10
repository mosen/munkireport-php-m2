<?php
namespace MrModule\ReportData\Providers;


use Illuminate\Support\ServiceProvider;

class ReportDataServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}