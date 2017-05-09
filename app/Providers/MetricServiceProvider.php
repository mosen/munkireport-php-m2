<?php
namespace Mr\Providers;

use Illuminate\Support\ServiceProvider;
use Mr\Metrics;

/**
 * MetricServiceProvider collects metrics from each module so that they can be provided in a single object which is
 * transmitted to the client.
 * 
 * @package Mr\Providers
 */
class MetricServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        
    }

    public function register()
    {
        $this->app->singleton(Metrics::class, function ($app) {
            return new Metrics(config('metrics'));
        });
    }

    public function provides()
    {
        return [Metrics::class];
    }
}