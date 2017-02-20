<?php
namespace MrModule\ARD\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;
use MrModule\ARD\CheckInHandler;

class ARDServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'MrModule\ARD';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('ards', 'ARDController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('ard', 'ARDController');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../views', 'ard');

        $moduleManager->add('ard', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
        
    }

    public function register() {
        $this->app->bind('MrModule\ARD\CheckInHandler', function ($app) {
            return new CheckInHandler();
        });

        $this->app->tag('MrModule\ARD\CheckInHandler', 'checkin');
    }
}