<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\BreadthSearch;

class Node
{
    public $name;
    public $friends = [];
    public $suitable = false;

    public function __construct($name, $suitable = false)
    {
        $this->name = $name;
        $this->suitable = $suitable;
    }
}
