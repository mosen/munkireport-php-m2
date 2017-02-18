<?php
namespace MrLegacy;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

/**
 * Legacy Request Factory
 *
 * This class was developed specifically to deal with URLs beginning with a question mark (?).
 * Laravel correctly routes these to the route matching '/' with a query string set to everything following the question
 * mark.
 *
 * Unfortunately because we cannot change the behaviour of MunkiReport v2 clients we need to intercept their requests
 * and change the query string into a request URI before the Laravel Router can match it.
 *
 * This Symfony Request Factory looks for a query parameter starting with a forward slash and assumes you actually
 * meant to use the path after the forward slash. This is then set as the REQUEST_URI server variable.
 *
 * @see \Symfony\Component\HttpFoundation\Request::setFactory()
 * @package MrLegacy
 */
class Request
{
    public static function factory(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null) {
        $query_keys = array_keys($query);
        if (count($query_keys) > 0 && strlen($query_keys[0]) > 0 && $query_keys[0][0] === '/') {
            $server['REQUEST_URI'] = $query_keys[0];
            return new SymfonyRequest($query, $request, $attributes, $cookies, $files, $server, $content);
        } else {
            return new SymfonyRequest($query, $request, $attributes, $cookies, $files, $server, $content);
        }
    }
}