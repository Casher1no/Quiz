<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\User\UserAnswer\UserAnswerService;

class UserController
{
    private UserAnswerService $userAnswerService;

    public function __construct(UserAnswerService $userAnswerService)
    {
        $this->userAnswerService = $userAnswerService;
    }

    public function answer():array
    {
        $requestPayload = json_decode(file_get_contents('php://input'), true);
        $selectedOptions = $requestPayload['answers'];
        return $selectedOptions;

        $this->userAnswerService->__invoke();
    }

}