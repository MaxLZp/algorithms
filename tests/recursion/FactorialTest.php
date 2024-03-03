<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\recursion;

use PHPUnit\Framework\TestCase;
use maxlzp\algo\recursion\Factorial;

class FactorialTest extends TestCase
{

    /**
     * Undocumented function
     *
     * @test
     * @dataProvider factorialDataProvider
     * @param  int  $input
     * @param  int  $expected
     * @return void
     */
    public function shouldGetFactorial($input, $expected)
    {
        $this->assertEquals($expected, Factorial::get($input));
    }

    public function factorialDataProvider()
    {
        return [
            [1,1],
            [2,2],
            [3,6],
            [4,24],
            [5,120],
        ];
    }
}
