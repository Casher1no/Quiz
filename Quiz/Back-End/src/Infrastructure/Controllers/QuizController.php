<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\Quiz\GetAllQuizzes\GetAllQuizzesService;
use Casher1no\Printful\Application\Quiz\GetQuizQuestions\GetQuizQuestionService;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\QuestionId;

class QuizController
{
    private GetAllQuizzesService $getAllQuizzesService;
    private GetQuizQuestionService $getQuizQuestionService;

    public function __construct(GetAllQuizzesService $getAllQuizzesService, GetQuizQuestionService $getQuizQuestionService)
    {
        $this->getAllQuizzesService = $getAllQuizzesService;
        $this->getQuizQuestionService = $getQuizQuestionService;
    }

    public function getAllQuizzes(): array
    {
        return $this->getAllQuizzesService->__invoke();
    }
    public function getQuizQuestions()
    {
        return $this->getQuizQuestionService->__invoke();
    }
}