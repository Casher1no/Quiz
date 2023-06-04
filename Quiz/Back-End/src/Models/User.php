<?php

namespace Casher1no\Printful\Models;

class User
{
    private int $id;
    private ?string $name;

    public function __construct(int $id, ?string $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

}