<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

class UserAnswerRequest
{
    private int $userId;
    private int $questionId;
    private array $answers;

    public function __construct(int $userId, int $questionId, array $answers)
    {
        $this->userId = $userId;
        $this->questionId = $questionId;
        $this->answers = $answers;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function questionId(): int
    {
        return $this->questionId;
    }

    public function answers(): array
    {
        return $this->answers;
    }

}