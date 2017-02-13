<?php

namespace MrLegacy\Http\Middleware;

use Closure;
use MrLegacy\Unserializer;

class SafePHPUnserialize
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
        if ($request->has('items')) {
            try {
                $unserializer = new Unserializer($request->items);
                $reqItems = $unserializer->unserialize();

                $request->merge(['unserialized_items' => $reqItems]);
            } catch (\Exception $e) {
                // Controller may handle this error condition
            }

        }

        return $next($request);
    }
}
