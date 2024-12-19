<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

final class QuickSort
{
    /**
     * Sort $input
     *
     * @param  array<mixed>  $input
     * @param  SortDirection $direction
     * @return array<mixed>
     */
    public static function sort(array $input, SortDirection $direction = SortDirection::ASC): array
    {
        if (count($input) <= 1) {
            return $input;
        }

        $pivot = (int)(count($input) / 2);
        $left = $right = [];
        $cmp = $direction->getComparer();

        for ($i = 0; $i < count($input); $i++) {
            if ($i == $pivot) {
                continue;
            }
            ($cmp($input[$i], $input[$pivot]))
                ? $right[] = $input[$i]
                : $left[] = $input[$i];
        }

        return array_merge(
            self::sort($left, $direction),
            [$input[$pivot]],
            self::sort($right, $direction)
        );
    }
}
