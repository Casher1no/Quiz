<?php

namespace Casher1no\Printful\DI;

use Casher1no\Printful\Application\Quiz\GetAllQuizzes\GetAllQuizzesService;
use Casher1no\Printful\Application\Quiz\GetQuizQuestions\GetQuizQuestionService;
use Casher1no\Printful\Application\Session\ClearSession\ClearSessionService;
use Casher1no\Printful\Application\Session\GetSession\GetSessionService;
use Casher1no\Printful\Application\Session\StartSession\StartSessionService;
use Casher1no\Printful\Infrastructure\Controllers\QuizController;
use Casher1no\Printful\Infrastructure\Controllers\SessionController;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\UserRepository;
use Casher1no\Printful\Infrastructure\Persistence\MySqlQuizRepository;
use Casher1no\Printful\Infrastructure\Persistence\MySqlUserRepository;
use Casher1no\Printful\Infrastructure\Repository\MySqlRepository;
use Casher1no\Printful\Infrastructure\Repository\Repository;
use DI;

class Config
{
    public static function DI_CONFIG(): array
    {
        return [
            // Interfaces
            Repository::class => function () {
                return new MySqlRepository();
            },
            QuizRepository::class => function () {
                return new MySqlQuizRepository(new MySqlRepository());
            },
            UserRepository::class => function () {
                return new MySqlUserRepository(new MySqlRepository());
            },

            // Controllers
            SessionController::class => function ($container) {
                $startSessionService = $container->get(StartSessionService::class);
                $getSessionService = $container->get(GetSessionService::class);
                $clearSessionService = $container->get(ClearSessionService::class);
                return new SessionController($startSessionService, $getSessionService, $clearSessionService);
            },
            QuizController::class => function ($container) {
                $getAllQuizzesService = $container->get(GetAllQuizzesService::class);
                $getQuizQuestionService = $container->get(GetQuizQuestionService::class);
                return new QuizController(
                    $getAllQuizzesService,
                    $getQuizQuestionService
                );
            },

            // Services
            StartSessionService::class => function () {
                return new StartSessionService();
            },
            GetSessionService::class => function () {
                return new GetSessionService();
            },
            ClearSessionService::class => function () {
                return new ClearSessionService();
            },
            GetAllQuizzesService::class => function ($container) {
                return new GetAllQuizzesService(
                    $container->get(QuizRepository::class)
                );
            }

        ];
    }
}