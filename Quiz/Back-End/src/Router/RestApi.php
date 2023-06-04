<?php

namespace Casher1no\Printful\Router;

use Casher1no\Printful\DI\Container;
use Casher1no\Printful\Infrastructure\Controllers\HomeController;
use Casher1no\Printful\Infrastructure\Controllers\QuizController;
use Casher1no\Printful\Infrastructure\Controllers\SessionController;
use FastRoute;
use FastRoute\Dispatcher;

class RestApi
{
    public static function Dispatcher(): Dispatcher
    {

        return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
            // Session
            $r->post('/session', [SessionController::class, 'startSession']);
            $r->get('/session', [SessionController::class, 'getSessionName']);
            $r->get('/clear-session', [SessionController::class], '');

            // Quiz
            $r->get('/quiz', [QuizController::class, 'getAllQuizzes']);
            $r->post('/quiz',[QuizController::class, 'getQuizQuestions']);
        });
    }
}