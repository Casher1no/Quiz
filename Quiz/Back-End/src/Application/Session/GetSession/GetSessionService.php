<?php

namespace Casher1no\Printful\Application\Session\GetSession;

class GetSessionService
{
    public function __invoke(): array
    {
        if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {
            return ['error' => 'no username or id'];
        }

        return [
            'username' => $_SESSION['username'],
            'id' => $_SESSION['id']
        ];
    }
}