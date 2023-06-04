<?php

namespace Casher1no\Printful\Infrastructure\Persistence;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Infrastructure\Repository\Repository;
use Casher1no\Printful\Models\QuestionId;
use Casher1no\Printful\Models\TestId;

class MySqlQuizRepository implements QuizRepository
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getTests()
    {
        // TODO: Implement getTests() method.
    }

    public function getQuestion(TestId $testId)
    {
        // TODO: Implement getQuestion() method.
    }

    public function getAnswers(QuestionId $questionId)
    {
        // TODO: Implement getAnswers() method.
    }
}