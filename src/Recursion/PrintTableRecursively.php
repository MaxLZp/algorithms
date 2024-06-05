<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Recursion;

final class PrintTableRecursively
{
    public static function printNonRecursive(int $n): void
    {
        for ($i = 0; $i < 10; $i++) {
            echo sprintf("%d * %d = %d", $i, $n, $i * $n).PHP_EOL;
        }
    }

    public static function printRecursive(int $n, int $i = 0): void
    {
        if ($i > 10) {
            return;
        }
        echo sprintf("%d * %d = %d", $i, $n, $i * $n).PHP_EOL;
        self::printRecursive($n, $i + 1);
    }
}
