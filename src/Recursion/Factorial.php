<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Recursion;

class Factorial
{
    public static function get($num)
    {
        return $num === 1 ? 1 : ($num * self::get($num - 1));
    }
}
