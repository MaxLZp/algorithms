<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\Dijkstra;

class Node
{
    public $name;
    /** @var Node */
    public $neighbors = [];
    public $cost = null;
    public ?Node $parent = null;

    public function __construct($name, $cost = false)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function updateCost(Node $parent, float $cost): void
    {
        if ($this->cost < $cost) {
            return;
        }
        $this->parent = $parent;
        $this->cost = $cost;
    }

    public function addNeighbor(Node $neighbor, float $cost): self
    {
        $this->neighbors[] = Edge::create($neighbor, $cost);

        return $this;
    }

}
