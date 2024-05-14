<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

class BubbleSort
{
    public static function sort($input, SortDirection $direction = SortDirection::ASC): array
    {
        if (count($input) <= 1) {
            return $input;
        }

        $comparer = $direction->getComparer();

        for ($i = 0; $i < count($input); $i++) {
            for ($j = 1; $j < count($input); $j++) {
                if ($comparer($input[$j - 1], $input[$j])) {
                    [$input[$j - 1], $input[$j]] = [$input[$j], $input[$j - 1]];
                }
            }
        }

        return $input;
    }
}
