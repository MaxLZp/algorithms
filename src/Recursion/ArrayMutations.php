<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Recursion;

final class ArrayMutations
{
    /**
     * Mutate array
     *
     * @param  array<mixed> $input
     * @return array<mixed>
     */
    public static function mutate(array $input): array
    {
        if (count($input) == 0) {
            return $input;
        }
        $result = [$input];
        static::doMutate($input, 0, $result);
        return $result;
    }

    /**
     * Execute mutation
     *
     * @param  array<mixed> $input
     * @param  integer      $start
     * @param  array<mixed> $result
     * @return void
     */
    private static function doMutate(array $input, int $start, array &$result = []): void
    {
        if (count($input) <= 1) {
            return;
        }

        for ($i = $start; $i < count($input) - 1; $i++) {
            list($input[$i], $input[$i + 1]) = [$input[$i + 1], $input[$i]];
            $result[] = $input;
            static::doMutate($input, $i + 1, $result);
            list($input[$i + 1], $input[$i]) = [$input[$i], $input[$i + 1]];
        }
    }
}
