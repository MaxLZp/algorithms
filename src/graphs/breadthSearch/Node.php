<?php

declare(strict_types=1);

namespace maxlzp\algo\graphs\breadthSearch;

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
