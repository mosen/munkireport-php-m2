<?php

namespace Mr\Providers;

use Illuminate\Routing\Matching\HostValidator;
use Illuminate\Routing\Matching\MethodValidator;
use Illuminate\Routing\Matching\SchemeValidator;
use Illuminate\Routing\Matching\UriValidator;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Route as IlluminateRoute;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use MrLegacy\Routing\Matching\QueryParameterValidator;
use Symfony\Component\HttpFoundation\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Mr\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

//        IlluminateRoute::$validators = [
//            new QueryParameterValidator,
//            new UriValidator, new MethodValidator,
//            new SchemeValidator, new HostValidator
//        ];

        //Request::setFactory([\MrLegacy\Request::class, 'factory']);

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapLegacyRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the legacy API routes for the application.
     *
     * These routes are stateless but the legacy API does not use a namespace prefix.
     */
    protected function mapLegacyRoutes()
    {
        Route::middleware('legacy')
            ->namespace($this->namespace)
            ->group(base_path('routes/legacy.php'));
    }
}
