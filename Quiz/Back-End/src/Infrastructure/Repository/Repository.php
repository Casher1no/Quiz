<?php

namespace Casher1no\Printful\Infrastructure\Repository;

use Doctrine\DBAL\Connection;

interface Repository
{
    public static function connection(): Connection;
}