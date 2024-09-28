<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\Dijkstra;

final class Edge
{
    public function __construct(
        public Node $node,
        public float $cost,
    ) {}

    public static function create(Node $node, float $cost,): self
    {
        return new self($node, $cost);
    }
}
