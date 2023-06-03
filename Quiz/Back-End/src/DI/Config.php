<?php

namespace Casher1no\Printful\DI;

use Casher1no\Printful\Application\Session\StartSession\StartSessionService;
use Casher1no\Printful\Infrastructure\Controllers\SessionController;
use DI;

class Config
{
    public static function DI_CONFIG(): array
    {
        return [
            // Interfaces


            // Services
            SessionController::class => function() {
            return new StartSessionService();
            }

        ];
    }
}