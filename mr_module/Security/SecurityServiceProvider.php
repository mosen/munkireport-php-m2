<?php
namespace MrModule\Security;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Mr\Module\ModuleManager;

class SecurityServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\Security';

    protected function mapWebRoutes()
    {
        Route::group([
            'prefix' => 'x',
            'middleware' => 'web',
            'namespace' => $this->namespace
        ], function () {
            Route::get('security/listing', 'SecurityController@listing');
        });
    }

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('security', 'SecurityController');
        });
    }
    
    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'security');

        $moduleManager->add('security', dirname(__DIR__))
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');
    }
}