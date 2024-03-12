<?php

declare(strict_types=1);

namespace maxlzp\algo\graphs\dijkstraSearch;

class Node
{
    public $name;
    public $neighbours = [];
    public $cost = null;

    public function __construct($name, $cost = false)
    {
        $this->name = $name;
        $this->cost = $cost;
    }
}
