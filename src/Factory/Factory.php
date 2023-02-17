<?php

declare(strict_types=1);

namespace ParadiseSecurity\Component\ServiceFactory\Factory;

final class Factory implements FactoryInterface
{
    public function __construct(private string $className)
    {
        $this->className = $className;
    }

    public function createNew(...$parameters): object
    {
        if (empty($parameters)) {
            return new $this->className();
        }

        return new $this->className(...$parameters);
    }
}
