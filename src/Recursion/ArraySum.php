<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Recursion;

class ArraySum
{
    public static function get($array, $start = null, $end = null)
    {
        $start = $start ?? 0;
        $end = $end ?? count($array) - 1;
        return ($end < $start)
            ? 0
            : ($array[$end] + self::get($array, $start, $end - 1));
        //or
        // : ($array[$start] + self::get($array, $start + 1, $end));
    }

    /**
     * Given an array, $arr, of integers, write a recursive function that add sum of all
     * previous numbers to index of the array.
     *
     * E.g.:
     * - input  [1, 2, 3, 4, 5, 6]
     * - result [1, 3, 6, 10, 15, 21]
     *
     * @param  array   $arr
     * @param  integer $sum
     * @return array
     */
    public static function getArray(array $arr, int $sum = 0): array
    {
        if (! $arr) {
            return [];
        }

        $s = $sum + $arr[0];
        return [$s, ...self::getArray(array_slice($arr, 1), $s)];
    }
}
