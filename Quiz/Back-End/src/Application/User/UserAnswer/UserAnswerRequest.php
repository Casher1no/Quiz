<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

class UserAnswerRequest
{
    private int $answerId;

    public function __construct(int $answerId)
    {
        $this->answerId = $answerId;
    }

    public function answerId(): int
    {
        return $this->answerId;
    }
}