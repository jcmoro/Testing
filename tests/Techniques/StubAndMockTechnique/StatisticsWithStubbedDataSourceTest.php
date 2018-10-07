<?php

declare(strict_types=1);

namespace Tests\Techniques\StubAndMockTechnique;

use PHPUnit\Framework\TestCase;
use Techniques\StubAndMockTechnique\Statistics;

class StatisticsWithStubbedDataSourceTest extends TestCase
{
    /**
     * @test
     */
    public function averageShouldReturnRightAverage(): void
    {
        $dataSource = new StubDataSource([1, 2, 3]);
        $statistics = new Statistics($dataSource);

        static::assertSame(2.0, $statistics->average());
    }
}
