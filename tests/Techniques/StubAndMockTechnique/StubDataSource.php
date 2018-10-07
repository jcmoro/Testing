<?php

declare(strict_types=1);

namespace Tests\Techniques\StubAndMockTechnique;

use Techniques\StubAndMockTechnique\DataSourceInterface;

class StubDataSource implements DataSourceInterface
{
    /** @var array */
    private $data;

    /**
     * StubDataSource constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function fetchData(): array
    {
        return $this->data;
    }
}
