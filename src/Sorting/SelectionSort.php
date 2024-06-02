<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class SelectionSort
{
    public static function sort(array $input, SortDirection $direction = SortDirection::ASC): array
    {
        $comparer = $direction->getComparer();
        $result = array_filter($input);
        for ($i = 0; $i < count($result); $i++) {
            for ($j = $i + 1; $j < count($result); $j++) {
                if ($comparer($result[$i], $result[$j])) {
                    list($result[$j], $result[$i]) = [$result[$i], $result[$j]];
                }
            }
        }
        return $result;
    }
}
