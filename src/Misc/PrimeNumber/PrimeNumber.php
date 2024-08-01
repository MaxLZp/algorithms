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

    /**
     * Find Primes.
     *
     * Second colution.
     *
     * @param  integer $min
     * @param  integer $max
     * @return array<int>
     */
    public static function findPrimes2(int $min, int $max): array
    {
        // Init
        // All numbers from 2 to $max
        // Ceive numbers will be reset to null later
        $numbers = [];
        for ($key = max(2, $min); $key <= $max; $key++) {
            $numbers[$key] = $key;
        }

        // run up to $key <= sqrt($max) as all greater number are checked earlier
        for ($key = max(2, $min); $key <= sqrt($max); $key++) {
            // Is ceive number was was reset null(and is not prime)
            if ($numbers[$key] == null) {
                continue;
            }
            if (self::isPrime($key)) {
                // reset $numbers values to null for all products of $key(up to $max)
                for ($i = 2 * $key; $i <= $max; $i += $key) {
                    $numbers[$i] = null;
                }
            }
        }

        return array_values(array_filter($numbers));
    }

}
