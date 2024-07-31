<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Dynamic\BubbleSortRecursive;

use MaxLZp\Algo\Sorting\SortDirection;

class BubbleSortRecursive
{
    /**
     * Sort the $input
     *
     * @param  array<mixed>  $input
     * @param  SortDirection $sortDirection
     * @return array<mixed>
     */
    public static function sort(array &$input, SortDirection $sortDirection = SortDirection::ASC): array
    {
        return self::doSort($input, $sortDirection->getComparer());
    }

    /**
     * Sort the $input
     *
     * @param  array<mixed>  $input
     * @param  callable $comparer
     * @param  ?int $len
     * @return array<mixed>
     */
    private static function doSort(array &$input, callable $comparer, int $len = null): array
    {
        $len = $len ?: count($input);
        if ($len <= 1) {
            return $input;
        }

        for ($i = 1; $i < $len; $i++) {
            if ($comparer($input[$i - 1], $input[$i])) {
                list($input[$i], $input[$i - 1]) = [$input[$i - 1], $input[$i]];
            }
        }

        return self::doSort($input, $comparer, $len - 1);
    }
}
