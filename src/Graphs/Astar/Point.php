<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Graphs\Astar;

/** A Point on a Field(surface) */
final class Point
{
    // WEIGHT IS ALWAYS == 1 for simplicity
    const WEIGHT = 1;

    /**
     * Constructor
     *
     * @param integer $y
     * @param integer $x
     * @param Point|null $parent Point lead here
     * @param integer $g Number of steps taken to get here
     * @param integer $h Heuristic distance to the destination Point
     * @param integer $f Priority value = $g + $h
     */
    public function __construct(
        public int $y,
        public int $x,
        public ?Point $parent = null,
        public int $g = 0,
        public int $h = 0,
        public int $f = 0,
    ) { }

    /**
     * Calculate Point's $h and $f
     *
     * @param Point $end
     * @return void
     */
    public function calc(Point $end): void
    {
        $this->h = $this->distanceTo($end);
        $this->f = $this->h + $this->g;
    }

    /**
     * Get array of Point's neighbors.
     * 
     * Top -> Right -> Bottom -> Left.
     * No diagonals.
     *
     * @return array
     */
    public function getNeighbors(): array
    {
        return [
            new Point(
                $this->y - 1, 
                $this->x,
                $this,
                $this->g + self::WEIGHT,
            ),
            new Point(
                $this->y, 
                $this->x + 1,
                $this,
                $this->g + self::WEIGHT,
            ),
            new Point(
                $this->y + 1, 
                $this->x,
                $this,
                $this->g + self::WEIGHT,
            ),
            new Point(
                $this->y, 
                $this->x - 1,
                $this,
                $this->g + self::WEIGHT,
            ),
        ];
    }

    /**
     * Check if teo Points are equal.
     * 
     * Check $x and $y only.
     *
     * @param Point $other
     * @return boolean
     */
    public function equals(Point $other): bool
    {
        return 
            $this->x == $other->x
            &&
            $this->y == $other->y
            ;
    }

    /**
     * Heuristic function to calculate distance to ending point.
     * 
     * "Manhattan" distance
     * @link https://www.geeksforgeeks.org/data-science/manhattan-distance/
     * @link https://cp-algorithms.com/geometry/manhattan-distance.html
     *
     * @param Point $other
     * @return integer
     */
    private function distanceTo(Point $other): int
    {
        return abs($this->x - $other->x) + abs($this->y - $other->y);
    }
}
