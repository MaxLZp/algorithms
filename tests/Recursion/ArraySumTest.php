<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Recursion;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Recursion\ArraySum;

class ArraySumTest extends TestCase
{
    /**
     * @test
     * @dataProvider factorialDataProvider
     * @param  array  $input
     * @param  int  $expected
     * @return void
     */
    public function shouldGetFactorial($input, $expected)
    {
        $this->assertEquals($expected, ArraySum::get($input));
    }

    public function factorialDataProvider(): array
    {
        return [
            [[], 0],
            [[1], 1],
            [[1, 2], 3],
            [[1, 2, 3], 6],
            [[4, 5, 6], 15],
        ];
    }

    /**
     * @test
     * @dataProvider getArrayDataProvider
     * @param  array  $input
     * @param  array  $expected
     * @return void
     */
    public function shouldGetArray($input, $expected)
    {
        $res = ArraySum::getArray($input);
        $diff = array_diff($res, $expected);
        $this->assertEquals(0, count($diff));
    }

    public function getArrayDataProvider(): array
    {
        return [
            [[], []],
            [[1], [1]],
            [[1, 2], [1, 3]],
            [[1, 2, 3], [1, 3, 6]],
            [[4, 5, 6], [4, 9, 15]],
        ];
    }
}
