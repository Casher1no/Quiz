<?php

namespace Casher1no\Printful\Application\Quiz\GetQuizResults;

class GetQuizResultRequest
{
    private int $userId;
    private int $quizId;

    public function __construct(int $userId, int $quizId)
    {
        $this->userId = $userId;
        $this->quizId = $quizId;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function quizId(): int
    {
        return $this->quizId;
    }


}