<?php

namespace Casher1no\Printful\Application\Session\StartSession;

class StartSessionRequest
{
    private string $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function username(): string
    {
        return $this->username;
    }
}