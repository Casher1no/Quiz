<?php

namespace Casher1no\Printful\Models;

class UserId
{
    private UserId $id;

    public function __construct(UserId $id)
    {
        $this->id = $id;
    }

    public function id(): UserId
    {
        return $this->id;
    }
}