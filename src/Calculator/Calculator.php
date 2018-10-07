<?php

declare(strict_types=1);

namespace Calculator;

class Calculator
{
    /**
     * @inheritdoc
     */
    public function add(int $operatorA, int $operatorB): int
    {
        return $operatorA + $operatorB;
    }
}
