<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\QuestionId;

class QuizController
{
    private QuizRepository $repository;

    public function __construct(QuizRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllQuizzes(): array
    {
        return $this->repository->getQuizzes();
    }
}