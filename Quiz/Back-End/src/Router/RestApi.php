<?php

namespace Casher1no\Printful\Router;

use Casher1no\Printful\DI\Container;
use Casher1no\Printful\Infrastructure\Controllers\HomeController;
use Casher1no\Printful\Infrastructure\Controllers\SessionController;
use FastRoute;
use FastRoute\Dispatcher;

class RestApi
{
    public static function Dispatcher(): Dispatcher
    {

        return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r)  {
            $r->post( '/api', [SessionController::class, 'startSession']);
        });
    }
}