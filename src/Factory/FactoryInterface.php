<?php

declare(strict_types=1);

namespace ParadiseSecurity\Component\ServiceFactory\Factory;

interface FactoryInterface
{
    public function createNew(...$parameters): object;
}
