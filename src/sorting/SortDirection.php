<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

enum SortDirection
{
    case ASC;
    case DESC;

    public function getComparer(): callable
    {
        return match($this){
            SortDirection::ASC => fn($l, $r) => $l > $r,
            SortDirection::DESC => fn($l, $r) => $r > $l,
        };
    }
}
