<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\Quiz\GetAllQuizzes\GetAllQuizzesService;
use Casher1no\Printful\Application\Quiz\GetQuizQuestions\GetQuizQuestionRequest;
use Casher1no\Printful\Application\Quiz\GetQuizQuestions\GetQuizQuestionService;
use Casher1no\Printful\Application\Quiz\GetQuizResults\GetQuizResultRequest;
use Casher1no\Printful\Application\Quiz\GetQuizResults\GetQuizResultsService;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\QuestionId;

class QuizController
{
    private GetAllQuizzesService $getAllQuizzesService;
    private GetQuizQuestionService $getQuizQuestionService;
    private GetQuizResultsService $getQuizResultsService;

    public function __construct(GetAllQuizzesService $getAllQuizzesService, GetQuizQuestionService $getQuizQuestionService, GetQuizResultsService $getQuizResultsService)
    {
        $this->getAllQuizzesService = $getAllQuizzesService;
        $this->getQuizQuestionService = $getQuizQuestionService;
        $this->getQuizResultsService = $getQuizResultsService;
    }

    public function getAllQuizzes(): array
    {
        return $this->getAllQuizzesService->__invoke();
    }

    public function getQuizQuestions(): array
    {
        $requestPayload = json_decode(file_get_contents('php://input'), true);
        $quizId = $requestPayload['quizId'];

        return $this->getQuizQuestionService->__invoke(
            new GetQuizQuestionRequest($quizId)
        );
    }

    public function getResults(): array
    {
        $requestPayload = json_decode(file_get_contents('php://input'), true);
        $quizId = $requestPayload['quizId'];
        $userId = $requestPayload['userId'];

        return $this->getQuizResultsService->__invoke(new GetQuizResultRequest($userId, $quizId));
    }
}