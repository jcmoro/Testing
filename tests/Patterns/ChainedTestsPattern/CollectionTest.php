<?php

declare(strict_types=1);

namespace Tests\Patterns\ChainedTestsPattern;

use PHPUnit\Framework\TestCase;
use Patterns\ChainedTestsPattern\Collection;

class CollectionTest extends TestCase
{
    /**
     * @test
     *
     * @return Collection
     */
    public function collectionShouldAcceptNewValues(): Collection
    {
        $collection = new Collection();
        $collection->insert(1);

        static::assertSame(1, $collection->count());

        return $collection;
    }

    /**
     * @test
     * @depends collectionShouldAcceptNewValues
     *
     * @param Collection $collection
     *
     * @return Collection
     */
    public function collectionCanDeleteValues(Collection $collection): Collection
    {
        $collection->remove(1);

        static::assertSame(0, $collection->count());

        return $collection;
    }

    /**
     * @test
     * @depends collectionCanDeleteValues
     * @expectedException \InvalidArgumentException
     *
     * @param Collection $collection
     */
    public function tryingToRemoveNonExistantValueShouldThrowException(Collection $collection): void
    {
        $collection->remove(1);
    }
}
