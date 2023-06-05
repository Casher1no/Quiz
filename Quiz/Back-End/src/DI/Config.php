<?php

namespace Casher1no\Printful\DI;

use Casher1no\Printful\Application\Quiz\GetAllQuizzes\GetAllQuizzesService;
use Casher1no\Printful\Application\Quiz\GetQuizQuestions\GetQuizQuestionService;
use Casher1no\Printful\Application\Quiz\GetQuizResults\GetQuizResultsService;
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
                return new SessionController($startSessionService);
            },
            QuizController::class => function ($container) {
                $getAllQuizzesService = $container->get(GetAllQuizzesService::class);
                $getQuizQuestionService = $container->get(GetQuizQuestionService::class);
                $getQuizResultService = $container->get(GetQuizResultsService::class);
                return new QuizController(
                    $getAllQuizzesService,
                    $getQuizQuestionService,
                    $getQuizResultService
                );
            },

            // Services
            StartSessionService::class => function ($container) {
                return new StartSessionService(
                    $container->get(UserRepository::class)
                );
            },
            GetAllQuizzesService::class => function ($container) {
                return new GetAllQuizzesService(
                    $container->get(QuizRepository::class)
                );
            },
            GetQuizQuestionService::class => function ($container) {
                return new GetQuizQuestionService($container->get(QuizRepository::class));
            },
            GetQuizResultsService::class => function ($container) {
                return new GetQuizResultsService(
                    $container->get(QuizRepository::class),
                    $container->get(UserRepository::class)
                );
            }

        ];
    }
}