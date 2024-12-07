<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class SelectionSort
{
    /**
     * Sort $input
     *
     * @param  array<mixed>  $input
     * @param  SortDirection $direction
     * @return array<mixed>
     */
    public static function sort(array $input, SortDirection $direction = SortDirection::ASC): array
    {
        $comparer = $direction->getComparer();
        $result = array_filter($input);
        for ($i = 0; $i < count($result); $i++) {
            $idx = $i;
            for ($j = $i + 1; $j < count($result); $j++) {
                if ($comparer($result[$idx], $result[$j])) {
                    $idx = $j;
                }
            }
            list($result[$idx], $result[$i]) = [$result[$i], $result[$idx]];
        }
        return $result;
    }
}
