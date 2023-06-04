<?php

namespace Casher1no\Printful\Application\Session\StartSession;

class StartSessionService
{
    public function __invoke(StartSessionRequest $request): array
    {
        if (empty($_POST['username'])) {
            return ['error' => 'no username'];
        }

        $_SESSION['username'] = $request->username();
        return ['username' => $_SESSION['username']];
    }
}