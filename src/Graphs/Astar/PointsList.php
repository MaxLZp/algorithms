<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Graphs\Astar;

/** A List of Points */
final class PointsList
{
    /** @var Point[] $items */
    private array $items = [];

    /**
     * Add Point to the List
     *
     * @param Point $point
     * @return void
     */
    public function add(Point $point): void
    {
        $this->items[] = $point;
    }

    /**
     * Check if a Point is in the List already.
     *
     * @param Point $point
     * @return boolean
     */
    public function contains(Point $point): bool
    {
        return count(array_filter($this->items, function(Point $item) use ($point) {
            return $item->equals($point);
        })) > 0;
    }

    /**
     * Array representation of the List.
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_filter($this->items);
    }
}
