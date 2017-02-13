<?php
namespace Mr\Facades;

use Illuminate\Support\Facades\Facade;

class CheckIn extends Facade
{
    protected static function getFacadeAccessor() {
        return 'Mr\Contracts\CheckIn\Router';
    }
}