<?php
namespace MrModule\CrashPlan\Providers;


use Illuminate\Support\ServiceProvider;

class CrashPlanServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}