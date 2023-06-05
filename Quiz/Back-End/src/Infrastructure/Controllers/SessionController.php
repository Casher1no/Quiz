<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\Session\StartSession\StartSessionRequest;
use Casher1no\Printful\Application\Session\StartSession\StartSessionService;

class SessionController
{
    private StartSessionService $startSessionService;

    public function __construct(StartSessionService $startSessionService)
    {
        $this->startSessionService = $startSessionService;
    }

    public function startSession(): array
    {
        $requestPayload = json_decode(file_get_contents('php://input'), true);
        $username = $requestPayload['username'];

        return $this->startSessionService->__invoke(
            new StartSessionRequest($username)
        );
    }
}