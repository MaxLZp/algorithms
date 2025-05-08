<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Misc\Matrix;

final class Matrix
{
    /**
     * Multiply matrices
     *
     * @param array<array<float>> $a
     * @param array<array<float>> $b
     * @return array<array<float>>
     */
    public static function multiply(array $a, array $b): array
    {
        $result = [];
        for ($i=0; $i < count($a); $i++) {
            for ($j=0; $j < count($a); $j++) {
                $result[$i][$j] = 0;
            }
        }

        for($row = 0; $row < count($result); $row++) {
            for($col = 0; $col < count($result); $col++) {

                for($c = 0; $c < count($b); $c++) {
                    $result[$row][$col] += $a[$row][$c] * $b[$c][$col];
                }

            }
        }


        return $result;
    }
}
