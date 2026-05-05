<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Graphs\Astar;

/** Field(surface). Built of Points. */
final class Field
{
    /**
     * Constructor
     *
     * @param integer $width   Field width
     * @param integer $height  Field height
     * @param PointsList $walls   List Of Walls
     */
    public function __construct(
        private int $width,
        private int $height,
        private PointsList $walls = new PointsList(),
    ) { }

    /**
     * Check if a Point belongs to the field.
     *
     * @param Point $point
     * @return boolean
     */
    public function hasPoint(Point $point): bool
    {
        return 
            $point->x >= 0
            &&
            $point->x < $this->width
            &&
            $point->y >= 0
            &&
            $point->y < $this->height
            &&
            !$this->walls->contains($point)
            ;
    }
}
