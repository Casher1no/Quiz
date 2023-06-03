<?php

namespace Casher1no\Printful\Infrastructure\Controllers;

use Casher1no\Printful\Router\View;

class HomeController
{
    public function home(): View
    {
        return new View('index');
    }

    public function api(): array
    {
        $users = [
            ['id' => 1, 'name' => 'John'],
            ['id' => 2, 'name' => 'Jane'],
        ];
        return $users;
    }

}