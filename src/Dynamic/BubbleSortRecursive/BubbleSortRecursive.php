<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Dynamic\BubbleSortRecursive;

use MaxLZp\Algo\Sorting\SortDirection;

class BubbleSortRecursive
{
    public static function sort(array &$input, SortDirection $sortDirection = SortDirection::ASC): array
    {
        return self::doSort($input, $sortDirection->getComparer());
    }

    private static function doSort(array &$input, callable $comparer, $len = null): array
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
