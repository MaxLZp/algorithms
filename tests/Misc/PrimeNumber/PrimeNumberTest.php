<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Misc\PrimeNumber;

use MaxLZp\Algo\Misc\PrimeNumber\PrimeNumber;
use PHPUnit\Framework\TestCase;

final class PrimeNumberTest extends TestCase
{
    /**
     * @dataProvider isPrimeProvider
     *
     * @param  integer $number
     * @param  boolean $expected
     * @return void
     */
    public function test_should_determine_if_prime_or_not(int $number, bool $expected): void
    {
        $this->assertEquals($expected, PrimeNumber::isPrime($number));
    }

    public function isPrimeProvider(): array
    {
        return [
            [1, false],
            [2, true],
            [3, true],
            [4, false],
            [5, true],
            [10, false],
        ];
    }

    /**
     * @dataProvider findPrimesProvider
     *
     * @param  integer $min
     * @param  integer $max
     * @param  array   $expected
     * @return void
     */
    public function test_should_find_primes_in_range(int $min, int $max, array $expected): void
    {
        $this->assertSame($expected, PrimeNumber::findPrimes($min, $max));
    }

    /**
     * @dataProvider findPrimesProvider
     *
     * @param  integer $min
     * @param  integer $max
     * @param  array   $expected
     * @return void
     */
    public function test_should_find_primes_in_range_ver2(int $min, int $max, array $expected): void
    {
        $this->assertSame($expected, PrimeNumber::findPrimes2($min, $max));
    }

    public function findPrimesProvider(): array
    {
        return [
            [0, 1, []],
            [0, 2, [2]],
            [2, 4, [2, 3]],
            [0, 10, [2, 3, 5, 7]],
            [-5, 10, [2, 3, 5, 7]],
        ];
    }
}
