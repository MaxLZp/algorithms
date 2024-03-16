<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class SelectionSort
{
    public static function sort($input, $direction = SortDirection::ASC): array
    {
        $result = array_filter($input);
        for ($i = 0; $i < count($result); $i++) {
            for ($j = $i + 1; $j < count($result); $j++) {
                if (
                    ($direction === SortDirection::ASC && $result[$j] < $result[$i])
                    ||
                    ($direction === SortDirection::DESC && $result[$j] > $result[$i])
                ) {
                    $temp = $result[$j];
                    $result[$j] = $result[$i];
                    $result [$i] = $temp;
                }
            }
        }
        return $result;
    }
}
