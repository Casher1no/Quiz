<?php

namespace Casher1no\Printful\DI;

use DI\ContainerBuilder;

class Container
{
    private static ContainerBuilder $builder;
    private static \DI\Container $container;

    public static function build(): void
    {
        self::$builder = new ContainerBuilder();
        self::$builder->addDefinitions(Config::DI_CONFIG());
        self::$container = self::$builder->build();
    }

    public static function getContainer(): \DI\Container
    {
        return self::$container;
    }
}