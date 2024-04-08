<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Search;

/**
 * Binary search in ordered indexed array
 */
class BinarySearch
{
    public const STEPS_LIMIT = 1000;

    /** @return array */
    public static function generateHaystack($start, $end, $step = 1)
    {
        return range($start, max($start, $end), $step);
    }

    /** @return SearchResult */
    public static function search($needle, $haystack)
    {
        $result = new SearchResult();
        $low = 0;
        $high = count($haystack) - 1 ;

        while ($low <= $high && $result->steps < self::STEPS_LIMIT) {
            $mid = (int)floor((($low + $high) / 2));
            if ($haystack[$mid] === $needle) {
                $result->result = $mid;
                break;
            }
            if ($needle < $haystack[$mid]) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }

            $result->steps++;
        }

        return $result;
    }
}
