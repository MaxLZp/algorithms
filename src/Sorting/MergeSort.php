<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Sorting;

final class MergeSort
{

    public static function sort($input, SortDirection $direction = SortDirection::ASC): array
    {
        // base case - input is sorted
        if (count($input) == 1) {
            return $input;
        }

        // split into into 2 parts and sort parts invidually
        $middle = (int)(count($input) / 2);
        $left = static::sort(array_slice($input, 0, $middle), $direction);
        $right = static::sort(array_slice($input, $middle), $direction);

        // merge sorted parts
        $result = [];
        for ($il = $ir = 0; $il < count($left) && $ir < count($right); ) {
            if (
                $direction == SortDirection::ASC ? $left[$il] < $right[$ir] : $left[$il] > $right[$ir]
            ) {
                $result[] = $left[$il];
                $il++;
            } else {
                $result[] = $right[$ir];
                $ir++;
            }
        }
        // Insert into result rest of uninserted values
        // All these values are in one part and are smaller(or greater) then one in the result
        $slice = array_slice($right, $ir);
        array_push($result, ...$slice);
        $slice = array_slice($left, $il);
        array_push($result, ...$slice);

        return $result;
    }
}
