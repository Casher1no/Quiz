<?php

namespace Casher1no\Printful\Application\Session\StartSession;

class StartSessionService
{
    public function __invoke(StartSessionRequest $request)
    {
        session_start();

        $_SESSION['username'] = 'JohnDoe';
    }
}