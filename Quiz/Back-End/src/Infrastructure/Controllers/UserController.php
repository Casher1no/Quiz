<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\User\UserAnswer\UserAnswerRequest;
use Casher1no\Printful\Application\User\UserAnswer\UserAnswerService;

class UserController
{
    private UserAnswerService $userAnswerService;

    public function __construct(UserAnswerService $userAnswerService)
    {
        $this->userAnswerService = $userAnswerService;
    }

    public function answer(): void
    {
        $requestPayload = json_decode(file_get_contents('php://input'), true);
        $answers = $requestPayload['answers'];
        $quizId = $requestPayload['quizId'];
        $userId = $requestPayload['userId'];
        $questions = $requestPayload['questions'];

        $this->userAnswerService->__invoke(new UserAnswerRequest($userId, $quizId, $answers, $questions));
    }

}