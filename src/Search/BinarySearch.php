<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Search;

/**
 * Binary search in ordered indexed array
 */
final class BinarySearch
{
    public const STEPS_LIMIT = 1000;

    /**
     * Generate haystack
     *
     * @param  integer $start
     * @param  integer $end
     * @param  integer $step
     * @return array<int|float>
     */
    public static function generateHaystack(int $start, int $end, int|float $step = 1): array
    {
        return range($start, max($start, $end), $step);
    }

    /**
     * Search $needle
     *
     * @param  integer          $needle
     * @param  array<int|float> $haystack
     * @return SearchResult
     */
    public static function search(int $needle, array $haystack): SearchResult
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
