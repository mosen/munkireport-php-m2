<?php
namespace Tests\Feature\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteCollectionTest extends TestCase
{
    public function testRouteMr2Scripts() {
        $response = $this->get('/?/module/location/get_script/init_location');

    }
}