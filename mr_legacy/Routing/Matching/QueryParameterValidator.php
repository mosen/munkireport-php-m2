<?php
namespace MrLegacy\Routing\Matching;

use Illuminate\Http\Request;
use Illuminate\Routing\Matching\ValidatorInterface;
use Illuminate\Routing\Route;

class QueryParameterValidator implements ValidatorInterface
{

    /**
     * Validate a given rule against a route and request.
     * Support a query parameter where() expression if the name starts with '?'.
     * A dirty hack but necessary.
     *
     * @param  \Illuminate\Routing\Route $route
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    public function matches(Route $route, Request $request)
    {
        foreach ($route->wheres as $name => $expression) {
            if ($name[0] !== '?') continue;

            $sanitisedName = substr($name, 1);
            if (in_array($sanitisedName, $request->query->keys())) {
                // No match expression means key presence is enough to match the route.
                if ($expression === 'EMPTY') return true;

                // TODO: expression validation
                return false;
            }
        }

        return false;
    }
}