<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\BreadthSearch;

final class Result
{
    public ?Node $suitable = null;

    /** @var Node[] */
    public array $path = [];

    public function pathString(): string
    {
        $result = $this->path ? $this->path[0]->name : '';
        for ($i = 1; $i < count($this->path); $i++) {
            $result .= ' -- '.($this->path[$i]->name);
        }
        return $result;
    }
}
