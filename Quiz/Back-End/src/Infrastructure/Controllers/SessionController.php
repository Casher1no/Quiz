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
        if (empty($_POST)) return ['error' => 'no username'];
        $username = ['username' => $_POST['username']];


        $this->startSessionService->__invoke(new StartSessionRequest($username));
        return $username;
    }
}