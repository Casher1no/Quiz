<?php

namespace Casher1no\Printful\Infrastructure\Persistence\Interfaces;

use Casher1no\Printful\Models\AnswerId;
use Casher1no\Printful\Models\QuestionId;
use Casher1no\Printful\Models\TestId;
use Casher1no\Printful\Models\UserId;

interface QuizRepository
{
    public function getQuizzes(): array;

    public function getQuestions(TestId $testId): array;

    public function getAnswers(QuestionId $questionId): array;

    public function answerQuestion(AnswerId $answerId, UserId $userId): void;
}