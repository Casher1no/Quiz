<?php

namespace Casher1no\Printful\Repository {

    use http\Exception\InvalidArgumentException;

    class MySql
    {
        private static $connection = null;

        public static function connection()
        {
            try {
                if (self::$connection === null) {
                    $connectionParams = [
                        'dbname' => $_ENV['MYSQL_DB_NAME'],
                        'user' => $_ENV['MYSQL_USER'],
                        'password' => $_ENV['MYSQL_PASSWORD'],
                        'host' => $_ENV['MYSQL_HOST'],
                        'driver' => 'pdo_mysql',
                    ];
                    self::$connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);
                }
                return self::$connection;
            }catch (\Exception $e)
            {
                Throw new InvalidArgumentException($e);
            }
        }
    }
}