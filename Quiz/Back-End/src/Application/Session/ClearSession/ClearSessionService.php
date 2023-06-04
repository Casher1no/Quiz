<?php

namespace Casher1no\Printful\Application\Session\ClearSession;

class ClearSessionService
{
    public function __invoke(): array
    {
        $_SESSION['username'] = null;
        $_SESSION['id'] = null;
        return ['status' => 'successful'];
    }
}