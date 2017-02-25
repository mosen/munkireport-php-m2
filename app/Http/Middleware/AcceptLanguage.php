<?php

namespace Mr\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

/**
 * The AcceptLanguage middleware tries to set the app locale according to the `Accept-Language` header in the user's
 * request.
 * 
 * @package Mr\Http\Middleware
 */
class AcceptLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $preferredLanguage = $request->getPreferredLanguage(['en', 'de', 'fr', 'es', 'nl', 'ru']);
        App::setLocale($preferredLanguage);

        return $next($request);
    }
}
