<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Recursion;

class Euklid
{
    public static function get($width, $height)
    {
        $min = min($width, $height);
        $max = max($width, $height);
        if ($max % $min == 0) {
            return $min;
        }
        return self::get($min, $max % $min);
    }
}
