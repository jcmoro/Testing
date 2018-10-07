<?php

declare(strict_types=1);

namespace Tests\Calculator;

use PHPUnit\Framework\TestCase;
use Calculator\Calculator;

/**
 * Calculator test suit.
 *
 * @Covers(\Calculator)
 * @Group(calculator)
 */
class CalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function addShouldReturnTheResultOfAddingOperatorAWithOperatorB(): void
    {
        $operatorA = 1;
        $operatorB = 2;

        $calculator = new Calculator();
        $result = $calculator->add($operatorA, $operatorB);

        static::assertSame(3, $result);
    }
}
