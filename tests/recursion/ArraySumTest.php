<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\recursion;

use PHPUnit\Framework\TestCase;
use maxlzp\algo\recursion\ArraySum;

class ArraySumTest extends TestCase
{

    /**
     * @test
     * @dataProvider factorialDataProvider
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    public function shouldGetFactorial($input, $expected)
    {
        $this->assertEquals($expected, ArraySum::get($input));
    }

    public function factorialDataProvider()
    {
        return [
            [[], 0],
            [[1], 1],
            [[1, 2], 3],
            [[1, 2, 3], 6],
            [[4, 5, 6], 15],
        ];
    }
}
