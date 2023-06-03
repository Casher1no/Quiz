<?php

namespace Casher1no\Printful\Application\Session\StartSession;

class StartSessionRequest
{
    private array $username;

    public function __construct(array $username)
    {
        $this->username = $username;
    }

    public function username(): array
    {
        return $this->username;
    }
}