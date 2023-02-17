<?php

declare(strict_types=1);

namespace ParadiseSecurity\Component\ServiceFactory\Test\Model;

final class ConstructorModel
{
    public function __construct(public string $name, public int $age)
    {
    }
}
