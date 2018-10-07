<?php

declare(strict_types=1);

namespace Tests\Techniques\StubAndMockTechnique;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Techniques\StubAndMockTechnique\DataSourceInterface;
use Techniques\StubAndMockTechnique\Statistics;

class StatisticsWithMockedDataSourceTest extends TestCase
{
    /**
     * @test
     */
    public function averageShouldReturnRightAverage(): void
    {
        /** @var MockObject|DataSourceInterface $dataSourceMock */
        $dataSourceMock = $this->createMock(DataSourceInterface::class);
        $dataSourceMock->expects(static::once())
            ->method('fetchData')
            ->willReturn([1, 2, 3]);

        $statistics = new Statistics($dataSourceMock);

        static::assertSame(2.0, $statistics->average());
    }
}
