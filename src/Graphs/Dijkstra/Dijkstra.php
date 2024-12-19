<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\Dijkstra;

use MaxLZp\Algo\Graphs\Dijkstra\Node;

final class Dijkstra
{
    /**
     * Find shortest path using Dijkstra algorithm.
     *
     * @param Node[] $graph
     * @return Node[]
     */
    public static function shortestPath(array $graph, Node $start, Node $end): Path
    {
        foreach ($graph as $node) {
            $node->cost = \PHP_INT_MAX;
        }
        $processedNodes = [];
        $currentNode = $start;
        $currentNode->cost = 0;

        while ($currentNode->name != $end->name || count($graph) < count($processedNodes)) {
            foreach ($currentNode->neighbors as $neighbor) {
                $neighbor->node->updateCost($currentNode, $currentNode->cost + $neighbor->cost);
            }
            $processedNodes[] = $currentNode;
            $currentNode = self::findClosest($graph, $processedNodes);
        }

        return Path::buildFrom($currentNode);
    }

    /**
     * Find closest node.
     *
     * Find non-processed node with the smallest cost.
     *
     * @param Node[] $graph
     * @param Node[] $processedNodes
     * @return \MaxLZp\Algo\Graphs\Dijkstra\Node
     */
    private static function findClosest(array $graph, array $processedNodes): Node
    {
        $newCurrentNode = null;
        foreach ($graph as $node) {
            if (!in_array($node, $processedNodes)) {
                if (! $newCurrentNode) {
                    $newCurrentNode = $node;
                    continue;
                }
                if ($node->cost < $newCurrentNode->cost) {
                    $newCurrentNode = $node;
                }
            }
        }
        return $newCurrentNode;
    }



}
