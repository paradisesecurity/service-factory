<?php

declare(strict_types=1);

namespace ParadiseSecurity\Component\ServiceFactory\Test\Factory;

use PHPUnit\Framework\TestCase;
use ParadiseSecurity\Component\ServiceFactory\Factory\Factory;
use ParadiseSecurity\Component\ServiceFactory\Factory\FactoryInterface;
use ParadiseSecurity\Component\ServiceFactory\Test\Model\ConstructorModel;
use ParadiseSecurity\Component\ServiceFactory\Test\Model\ConstructorlessModel;

final class FactoryTest extends TestCase
{
    public function testFactoryCanCreateConstructorlessModel()
    {
        $factory = $this->createFactory(ConstructorlessModel::class);

        $model = $factory->createNew();

        $model->name = 'Bob';
        $model->age = 30;

        $this->assertSame('Bob', $model->name);
        $this->assertSame(30, $model->age);
    }

    public function testFactoryCanCreateConstructorModel()
    {
        $factory = $this->createFactory(ConstructorModel::class);

        $model = $factory->createNew('Bob', 30);

        $this->assertSame('Bob', $model->name);
        $this->assertSame(30, $model->age);
    }

    public function testFactoryCanThrowExceptions(): void
    {
        $factory = $this->createFactory(ConstructorModel::class);

        try {
            $model = $factory->createNew();
            $this->failException(\ArgumentCountError::class);
        } catch (\ArgumentCountError $exception) {
            $this->assertStringStartsWith('Too few arguments to function', $exception->getMessage());
        }
    }

    private function createFactory(string $className): FactoryInterface
    {
        return new Factory($className);
    }
}
