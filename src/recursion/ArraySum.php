<?php

declare(strict_types=1);

namespace maxlzp\algo\recursion;

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
}
