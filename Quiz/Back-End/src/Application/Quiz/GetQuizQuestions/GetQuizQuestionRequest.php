<?php

namespace Casher1no\Printful\Application\Quiz\GetQuizQuestions;

class GetQuizQuestionRequest
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function id(): int
    {
        return $this->id;
    }
}