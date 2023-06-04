<?php

namespace Casher1no\Printful\Application\Session\ClearSession;

class ClearSessionService
{
    public function __invoke(): array
    {
        $_SESSION['username'] = null;
        return ['status' => 'successful'];
    }
}