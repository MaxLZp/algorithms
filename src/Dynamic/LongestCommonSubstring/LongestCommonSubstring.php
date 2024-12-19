<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Dynamic\LongestCommonSubstring;

final class LongestCommonSubstring
{
    /**
     * Find longest common substring
     *
     * Fill the grid:
     *    h i s h
     * f  0 0 0 0
     * i  0 1 0 0
     * s  0 0 2 0
     * h  1 0 0 3
     *
     * When letters don't match - fill cell with 0.
     * When letters match fill cell with value of top-left neighbor + 1.
     *
     * @param  string $input1
     * @param  string $input2
     * @return string
     */
    public static function find(string $input1, string $input2): string
    {
        $maxLength = 0;
        $maxLengthIndex = 0;

        $table = [];
        for ($i = 0; $i < strlen($input1); $i++) {
            $table[] = [];
            for ($j = 0; $j < strlen($input2); $j++) {
                if (strcasecmp($input1[$i], $input2[$j]) !== 0) {
                    $table[$i][$j] = 0;
                    continue;
                }

                if (!isset($table[$i - 1][$j - 1])) {
                    $table[$i][$j] = 1;
                    $maxLength = 1;
                    continue;
                }

                $table[$i][$j] = $table[$i - 1][$j - 1] + 1;
                if ($table[$i][$j] > $maxLength) {
                    $maxLength = $table[$i][$j];
                    $maxLengthIndex = $i;
                }
            }
        }

        return substr($input1, $maxLengthIndex - $maxLength + 1, $maxLength);
    }
}
