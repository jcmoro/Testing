<?php

namespace Techniques\StubAndMockTechnique;

class Statistics implements StatisticsInterface
{
    /** @var DataSourceInterface */
    private $dataSource;

    /**
     * Statistics constructor.
     *
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @inheritdoc
     */
    public function average(): float
    {
        $total = 0;
        $data = $this->dataSource->fetchData();

        foreach ($data as $value) {
            $total += $value;
        }

        $average = ($total / \count($data));

        return $average;
    }
}
