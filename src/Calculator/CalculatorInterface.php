<?php

declare(strict_types=1);

namespace Calculator;

interface CalculatorInterface
{
    /**
     * Returns the result of adding operator A and operator B.
     *
     * @param int $operatorA
     * @param int $operatorB
     *
     * @return int
     */
    public function add(int $operatorA, int $operatorB): int;
}
