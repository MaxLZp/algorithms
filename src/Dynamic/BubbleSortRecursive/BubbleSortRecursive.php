<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Dynamic\BubbleSortRecursive;

use MaxLZp\Algo\Sorting\SortDirection;

class BubbleSortRecursive
{
    public static function sort(array &$input, string $sortDirection = SortDirection::ASC, $len = null): array
    {
        $len = $len ?: count($input);
        if ($len <= 1) { return $input; }

        $comparer = self::getComparer($sortDirection);

        for ($i = 1; $i < $len; $i++) {
            if ($comparer($input[$i-1], $input[$i])) {
                list($input[$i], $input[$i-1]) = [$input[$i-1], $input[$i]];
            }
        }
        return self::sort($input, $sortDirection, $len - 1);
    }

    private static function getComparer(string $sortDirection): callable
    {
        return $sortDirection == SortDirection::ASC
            ? fn($l, $r) => $l > $r
            : fn($l, $r) => $l < $r;
    }
}
