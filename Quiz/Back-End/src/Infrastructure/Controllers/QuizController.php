<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\Quiz\GetAllQuizzes\GetAllQuizzesService;
use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\QuestionId;

class QuizController
{
    private GetAllQuizzesService $getAllQuizzesService;

    public function __construct(GetAllQuizzesService $getAllQuizzesService)
    {
        $this->getAllQuizzesService = $getAllQuizzesService;
    }

    public function getAllQuizzes(): array
    {
        return $this->getAllQuizzesService->__invoke();
    }
}