<?php
namespace MrModule\ARD\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
use Mr\Module\ModuleManager;

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

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/ARD/routes.php'));
    }

    public function boot(ModuleManager $moduleManager) {
        $this->mapApiRoutes();
        $this->loadMigrationsFrom(__DIR__.'/../migrations');

        $moduleManager->add('ard')
            ->installs('install.sh')
            ->uninstalls('uninstall.sh');
        
    }

    public function register() {
    }
}