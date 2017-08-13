<?php
namespace MrModule\Example;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

class ExampleServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'MrModule\Example';

    protected function mapApiRoutes()
    {
        Route::group([
            'prefix' => 'xapi',
            'middleware' => 'api',
            'namespace' => $this->namespace
        ], function () {
            Route::resource('example', 'ExampleController');
        });
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->publishes([
            __DIR__.'/public' => public_path('x/example'),
        ], 'public');

        $moduleManager->add('example', __DIR__)
            ->installs('scripts/install.sh')
            ->uninstalls('scripts/uninstall.sh');

    }

    public function register() {
        $this->app->bind(Metadata::class, function ($app) {
            return new Metadata;
        });
        $this->app->tag(Metadata::class, 'modules');
    }
}