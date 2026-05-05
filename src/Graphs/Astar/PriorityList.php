<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Graphs\Astar;

/** 
 * A List of Points built according to the Point::$f value priority.
 * The lower the $f value the higher the priority.
 */
class PriorityList
{
    /** @var Point[] $items */
    private $items = [];

    /**
     * Add Point to the list.
     *
     * @param Point $point
     * @return void
     */
    public function add(Point $point): void
    {
        if ($this->alreadyAdded($point)) {
            return;
        }

        $this->items[] = $point;
        $i = count($this->items) - 1;
        while (
            $i > 0 
            && 
            $this->items[$i]->f < $this->items[$i - 1]->f
        ) {
            $tmp = $this->items[$i - 1];
            $this->items[$i - 1] = $this->items[$i];
            $this->items[$i] = $tmp;
            $i--;
        }
    }

    /**
     * Check if the List has any Points
     *
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return count($this->items) == 0;
    }

    /**
     * Pop a Point from the top of the List.
     *
     * @return Point|null
     */
    public function pop(): ?Point
    {
        return array_shift($this->items);
    }

    /**
     * Check if a Point is in the List already.
     *
     * @param Point $point
     * @return boolean
     */
    private function alreadyAdded(Point $point): bool
    {
        return count(array_filter($this->items, function(Point $item) use ($point) {
            return $item->equals($point);   
        })) > 0;
    }
}
