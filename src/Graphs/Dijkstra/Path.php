<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\Dijkstra;

final class Path
{
    private $path = [];

    public static function create(): self
    {
        return new self();
    }

    public static function buildFrom(Node $end): self
    {
        $path = self::create();
        $path->path[] = $end;
        while($end->parent) {
            array_unshift($path->path, $end->parent);
            $end = $end->parent;
        };

        return $path;
    }

    public function __toString(): string
    {
        return array_reduce($this->path, function($c, $node) { return$c.$node->name; }, '');
    }
}
