<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class BubbleSort
{
    public static function sort($input, $direction = SortDirection::ASC): array
    {
        if (count($input) <= 1) { return $input; }

        $compare = $direction == SortDirection::ASC
            ? [BubbleSort::class, 'compareAsc']
            : [BubbleSort::class, 'compareDesc'];

        for ($i=0; $i < count($input); $i++) {
            for ($j=1; $j < count($input); $j++) {
                if ($compare($input[$j-1], $input[$j])) {
                    [$input[$j-1], $input[$j]] = [$input[$j], $input[$j-1]];
                }
            }
        }

        return $input;
    }

    private static function compareAsc($l, $r): bool
    {
        return $r < $l;
    }

    private static function compareDesc($l, $r): bool
    {
        return $r > $l;
    }
}
