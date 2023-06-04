<?php

use Casher1no\Printful\DI\Container;
use Casher1no\Printful\Infrastructure\CORS;
use Casher1no\Printful\Router\RestApi;
use FastRoute\Dispatcher;

require 'vendor/autoload.php';

CORS::setUp();
Container::build();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dispatcher = RestApi::Dispatcher();

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        // Handle 404 Not Found error
        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        // Handle 405 Method Not Allowed error
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
    case Dispatcher::FOUND:
        // Extract the route handler and parameters
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        // Call the route handler with the parameters
        [$controllerClass, $method] = $handler;
        if (Container::getContainer()->has($controllerClass)) {
            $controller = new $controllerClass(Container::getContainer()->get($controllerClass));
        } else {
            $controller = new $controllerClass();
        }
        $response = $controller->$method($vars);

        // Send the JSON response
        header('Content-Type: application/json');


        echo json_encode($response);
        break;
}



