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
        return true;
    }
}