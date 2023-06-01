<?php

namespace Casher1no\Printful\Router;

use Casher1no\Printful\Controllers\HomeController;
use FastRoute;
use FastRoute\Dispatcher;

class Routes
{
    public static function Dispatcher(): Dispatcher
    {
        return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/', [HomeController::class, 'home']);
            $r->addRoute('GET', '/api', [HomeController::class, 'api']);
        });
    }
}