<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\AnswerId;
use Casher1no\Printful\Models\User;

class UserAnswerService
{
    private QuizRepository $repository;

    public function __construct(QuizRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserAnswerRequest $request): array
    {


        $questionId = new AnswerId($request->questionId());

        return $this->repository->getAnswers($request->answers());

        $this->repository->answerQuestion($questionId, $user);
    }
}