<?php
namespace MrModule\DeployStudio;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DeployStudioServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\DeployStudio';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('deploystudio', 'DeployStudioController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('deploystudio', 'DeployStudioController');
        });
    }

    public function boot() {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}