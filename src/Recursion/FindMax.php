<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Recursion;

final class FindMax
{
    public static function find($array, $l = null, $r = null): int
    {
        $l = $l ?? 0;
        $r = $r ?? count($array) - 1;

        if ($l == $r) {
            return $array[$l];
        }
        $m = (int)(($r - $l) / 2);
        $lm = static::find($array, $l, $m);
        $rm = static::find($array, $m+1, $r);

        return $lm > $rm ? $lm : $rm;
    }
}
