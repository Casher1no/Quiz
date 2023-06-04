<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

class UserAnswerRequest
{
    private int $questionId;
    private array $answers;

    public function __construct(int $questionId, array $answers)
    {
        $this->questionId = $questionId;
        $this->answers = $answers;
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