<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

final class BubbleSort
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
        if (count($input) <= 1) {
            return $input;
        }

        $comparer = $direction->getComparer();

        for ($i = 0; $i < count($input); $i++) {
            for ($j = 1; $j < count($input) - $i; $j++) {
                if ($comparer($input[$j - 1], $input[$j])) {
                    [$input[$j - 1], $input[$j]] = [$input[$j], $input[$j - 1]];
                }
            }
        }

        return $input;
    }
}
