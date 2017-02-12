<?php
namespace MrModule\DirectoryService\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class DirectoryServiceProvider extends ServiceProvider
{
    protected $namespace = 'MrModule\DirectoryService';

    protected function mapApiRoutes()
    {
        Route::prefix('xapi')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('mr_module/DirectoryService/routes.php'));
    }

    public function boot() {
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}