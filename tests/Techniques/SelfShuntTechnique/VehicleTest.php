<?php

declare(strict_types=1);

namespace Tests\Techniques\SelfShuntTechnique;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Techniques\SelfShuntTechnique\Speed;
use Techniques\SelfShuntTechnique\Vehicle;

class VehicleTest extends TestCase implements Speed
{
    /** @var Vehicle */
    private static $vehicle;

    /** @var float */
    private static $overSpeed = 120.0;

    /**
     * @inheritDoc
     */
    public static function setUpBeforeClass()
    {
        self::$vehicle = new Vehicle();
    }

    /**
     * @test
     */
    public function whenVehicleSpeedIsUnderOverSpeedShouldReturnFalse(): void
    {
        self::$vehicle = new Vehicle();

        /** @var Speed $speedMock */
        $speedMock = $this->createSpeedMock(100.0);
        self::$vehicle->updateSpeed($speedMock);

        static::assertFalse(self::$vehicle->isOverSpeeding($this));
    }

    /**
     * @param float $speed
     *
     * @return MockObject
     *
     * @throws \ReflectionException
     */
    protected function createSpeedMock(float $speed): MockObject
    {
        $speedMock = $this->createMock(Speed::class);
        $speedMock->expects(static::any())
            ->method('value')
            ->willReturn($speed);

        return $speedMock;
    }

    /**
     * @test
     */
    public function whenVehicleSpeedIsAvobeOverSpeedShouldReturnTrue(): void
    {
        self::$vehicle = new Vehicle();

        /** @var Speed $speedMock */
        $speedMock = $this->createSpeedMock(180.0);
        self::$vehicle->updateSpeed($speedMock);

        static::assertTrue(self::$vehicle->isOverSpeeding($this));
    }

    /**
     * @test
     */
    public function whenVehicleSpeedIsSameAsOverSpeedShouldReturnFalse(): void
    {
        self::$vehicle = new Vehicle();

        /** @var Speed $speedMock */
        $speedMock = $this->createSpeedMock(self::$overSpeed);
        self::$vehicle->updateSpeed($speedMock);

        static::assertFalse(self::$vehicle->isOverSpeeding($this));
    }

    /**
     * @test
     */
    public function speedShouldReturnCurrentVehicleSpeed(): void
    {
        self::$vehicle = new Vehicle();
        self::$vehicle->updateSpeed($this);

        static::assertSame($this->value(), self::$vehicle->speed());
    }

    /**
     * @inheritDoc
     */
    public function value(): float
    {
        return self::$overSpeed;
    }
}
