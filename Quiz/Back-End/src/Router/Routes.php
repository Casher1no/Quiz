<?php

namespace Casher1no\Printful\Router;

use Casher1no\Printful\Infrastructure\Controllers\HomeController;
use FastRoute;
use FastRoute\Dispatcher;

class Routes
{
    public static function Dispatcher(): Dispatcher
    {
        return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
            $r->get( '/api', [HomeController::class, 'api']);
        });
    }
}