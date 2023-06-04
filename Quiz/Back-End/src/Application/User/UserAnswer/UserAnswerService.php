<?php

namespace Casher1no\Printful\Application\User\UserAnswer;

use Casher1no\Printful\Infrastructure\Persistence\Interfaces\QuizRepository;
use Casher1no\Printful\Models\AnswerId;
use Casher1no\Printful\Models\QuestionId;
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
        $user = new User($request->userId());
        $question = new QuestionId($request->questionId());
        $answers =$request->answers();

        $this->repository->answerQuestion($answers, $question, $user);

    }
}