<?php

namespace Casher1no\Printful\Controllers;

use Casher1no\Printful\Router\View;
use PHPUnit\Util\Json;

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