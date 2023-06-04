<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Application\Session\ClearSession\ClearSessionService;
use Casher1no\Printful\Application\Session\GetSession\GetSessionService;
use Casher1no\Printful\Application\Session\StartSession\StartSessionRequest;
use Casher1no\Printful\Application\Session\StartSession\StartSessionService;

class SessionController
{
    private StartSessionService $startSessionService;
    private GetSessionService $getSessionService;
    private ClearSessionService $clearSessionService;

    public function __construct(StartSessionService $startSessionService, GetSessionService $getSessionService, ClearSessionService $clearSessionService)
    {
        $this->startSessionService = $startSessionService;
        $this->getSessionService = $getSessionService;
        $this->clearSessionService = $clearSessionService;
    }

    public function startSession(): array
    {
        return $this->startSessionService->__invoke(
            new StartSessionRequest($_POST['username'])
        );
    }

    public function getSessionName(): array
    {
        return $this->getSessionService->__invoke();
    }

    public function clearSession(): array
    {
        return $this->clearSessionService->__invoke();
    }
}