<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class InsertionSort
{
    public static function sort($input, $direction = SortDirection::ASC): array
    {
        $result = array_filter($input);
        $compare = self::getCompare($direction);

        for ($i = 0; $i < count($result); $i++) {

            for ($j = $i; $j > 0; $j--) {
                if ($compare($result[$j], $result[$j-1])) {
                    list($result[$j], $result[$j-1]) = [$result[$j-1], $result[$j]];
                }
            }

        }
        return $result;
    }

    private static function getCompare($direction = SortDirection::ASC): callable
    {
        return $direction == SortDirection::ASC
            ? [InsertionSort::class, 'ascCompare']
            : [InsertionSort::class, 'descCompare'];
    }

    private static function ascCompare($l, $r): bool
    {
        return $l < $r;
    }

    private static function descCompare($l, $r): bool
    {
        return $l > $r;
    }

}
