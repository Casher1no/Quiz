<?php

namespace Casher1no\Printful\Infrastructure\Persistence\Interfaces;

use Casher1no\Printful\Models\QuestionId;
use Casher1no\Printful\Models\TestId;

interface QuizRepository
{
    public function getTests();
    public function getQuestion(TestId $testId);
    public function getAnswers(QuestionId $questionId);
}