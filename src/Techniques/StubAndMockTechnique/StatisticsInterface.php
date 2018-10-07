<?php

declare(strict_types=1);

namespace Techniques\StubAndMockTechnique;

interface StatisticsInterface
{
    /**
     * Returns the average of a data source.
     *
     * @return float
     */
    public function average(): float;
}
