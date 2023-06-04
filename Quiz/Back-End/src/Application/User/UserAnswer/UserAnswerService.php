<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

use Casher1no\Printful\Application\Session\StartSession\StartSessionRequest;
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

    public function __invoke(UserAnswerRequest $request): void
    {
        $user = new User(
            $_SESSION['id'],
            $_SESSION['username']
        );

        $answerId = new AnswerId($request->answerId());

        $this->repository->answerQuestion($answerId, $user);
    }
}