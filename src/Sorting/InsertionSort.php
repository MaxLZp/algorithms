<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class InsertionSort
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
        $result = array_filter($input);
        $compare = $direction->getComparer();

        for ($i = 0; $i < count($result); $i++) {

            for ($j = $i; $j > 0; $j--) {
                if ($compare($result[$j - 1], $result[$j])) {
                    list($result[$j], $result[$j - 1]) = [$result[$j - 1], $result[$j]];
                }
            }

        }
        return $result;
    }

}
