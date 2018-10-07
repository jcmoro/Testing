<?php

declare(strict_types=1);

namespace Patterns\ChainedTestsPattern;

class Collection
{
    private $values = [];

    /**
     * Adds new value.
     *
     * @param int $value
     */
    public function insert(int $value): void
    {
        $this->values[] = $value;
    }

    /**
     * Returns the values count.
     *
     * @return int
     */
    public function count(): int
    {
        return \count($this->values);
    }

    /**
     * @param int $value
     */
    public function remove(int $value): void
    {
        foreach ($this->values as $key => $collectionValue) {
            if ($value === $collectionValue) {
                unset($this->values[$key]);
                $this->values = \array_values($this->values);

                return;
            }
        }

        throw new \InvalidArgumentException('Value not found');
    }
}
