<?php

namespace Casher1no\Printful\Application\Session\GetSession;

class GetSessionService
{
    public function __invoke(): array
    {
        if (!isset($_SESSION['username'])) {
            return ['error' => 'no username'];
        }

        return ['username' => $_SESSION['username']];
    }
}