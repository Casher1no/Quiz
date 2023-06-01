<?php

namespace Casher1no\Printful;

class Redirect
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }
    public function getPath():string
    {
        return $this->path;
    }
}