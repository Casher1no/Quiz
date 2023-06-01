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

    public function api(): string
    {
        return json_encode("values");
    }

}