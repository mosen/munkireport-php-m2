<?php
namespace MrModule\Printer\Providers;

use Illuminate\Support\ServiceProvider;

class PrinterServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}