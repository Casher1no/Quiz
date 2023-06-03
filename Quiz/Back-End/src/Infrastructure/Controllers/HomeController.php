<?php

namespace Casher1no\Printful\Infrastructure\Controllers;


class HomeController
{

    public function api(): array
    {
        $users = [
            ['id' => 1, 'name' => 'John'],
            ['id' => 2, 'name' => 'Jane'],
        ];
        return $users;
    }

}