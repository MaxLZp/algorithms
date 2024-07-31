<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\BreadthSearch;

class Node
{
    public string $name;
    /** @var array<Node> */
    public array $friends = [];
    public bool $suitable = false;

    public function __construct(string $name, bool $suitable = false)
    {
        $this->name = $name;
        $this->suitable = $suitable;
    }
}
