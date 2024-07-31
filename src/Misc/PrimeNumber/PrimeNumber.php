<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Misc\PrimeNumber;

final class PrimeNumber
{
    public static function isPrime(int $number): bool
    {
        if ($number < 2) {
            return false;
        }
        for ($i = 2, $max = sqrt($number); $i <= $max; $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * Find Primes
     *
     * @param  integer $min
     * @param  integer $max
     * @return array<int>
     */
    public static function findPrimes(int $min, int $max): array
    {
        $ceive = [];
        $numbers = [];
        for ($key = max(2, $min); $key <= $max; $key++) {
            if (isset($ceive[$key])) {
                continue;
            }
            if (self::isPrime($key)) {
                $numbers[] = $key;
            }
            for ($i = 2 * $key; $i <= $max; $i += $key) {
                $ceive[$i] = $i;
            }
        }
        return $numbers;
    }
}
