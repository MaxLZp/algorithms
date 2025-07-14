<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Recursion;

final class Ruler
{
    public static function draw($height): string
    {
        if (!$height) { return '0'; }
        return static::draw($height - 1) . $height . static::draw($height - 1);
    }
}
