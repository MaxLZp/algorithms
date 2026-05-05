<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Graphs\Astar;

use MaxLZp\Algo\Graphs\Astar\PriorityList;

/**
 * A* algorithm implementation.
 * 
 * Manhattan distance heuristic function.
 * No diagonal neighbors.
 */
final class Astar
{
    /**
     * Find the shortest path from $start to $end.
     *
     * @param Field $field
     * @param Point $start
     * @param Point $end
     * @return Point[]
     */
    public static function find(
        Field $field, 
        Point $start, 
        Point $end
    ): array {
        $openList = new PriorityList();
        $closedList = new PointsList();

        $start->calc($end);
        $openList->add($start);

        while (!$openList->isEmpty()) {
            $current = $openList->pop();
            $found = $current->equals($end);

            if ($closedList->contains($current)) {
                // Point has already been visited
                continue;
            }
            
            $closedList->add($current);

            if ($found) {
                break;
            }

            $neighbors = $current->getNeighbors();
            foreach($neighbors as $neighbor) {
                if($field->hasPoint($neighbor)) {
                    $neighbor->calc($end);
                    $openList->add($neighbor);
                }
            }
        }

        return self::buildPathArray($closedList);
    }

    /**
     * Build shortest path array from a PointsList.
     *
     * @param PointsList $list
     * @return array
     */
    private static function buildPathArray(PointsList $list): array
    {
        $result = [];
        $closedList = $list->toArray();
        $current = $closedList[count($closedList) - 1];
        while ($current) {
            $result[] = $current;
            $current = $current->parent;
        }

        return array_reverse($result);
    }
}
