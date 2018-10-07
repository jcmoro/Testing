<?php

declare(strict_types=1);

namespace Techniques\StubAndMockTechnique;

interface DataSourceInterface
{
    /**
     * @return int[]
     */
    public function fetchData(): array;
}
