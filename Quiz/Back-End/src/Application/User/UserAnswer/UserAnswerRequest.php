<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

class UserAnswerRequest
{
    private int $userId;
    private int $quizId;
    private array $answers;
    private array $questions;

    public function __construct(int $userId, int $quizId, array $answers, array $questions)
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
        $this->answers = $answers;
        $this->questions = $questions;
    }

    public function questions(): array
    {
        return $this->questions;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function quizId(): int
    {
        return $this->quizId;
    }

    public function answers(): array
    {
        return $this->answers;
    }

}