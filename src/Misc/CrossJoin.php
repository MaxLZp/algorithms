<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Misc;

final class CrossJoin
{
    /**
     * Cross join arrays
     *
     * @param  array<array<mixed>> ...$arrays
     * @return array<array<mixed>>
     */
    public static function join(array ...$arrays): array
    {
        $results = [[]];

        foreach ($arrays as $index => $array) {
            $append = [];

            foreach ($results as $product) {
                foreach ($array as $item) {
                    $product[$index] = $item;

                    $append[] = $product;
                }
            }

            $results = $append;
        }

        return $results;
    }
}
