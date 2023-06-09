<?php

namespace Casher1no\Printful\Application\Quiz\GetAllQuizzes;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;

class GetAllQuizzesService
{
    private QuizRepository $repository;

    public function __construct(QuizRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array
    {
        // Returns all quizzes names with ids
        return ['questions' => $this->repository->getQuizzes()];
    }
}