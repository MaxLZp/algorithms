<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\recursion;

use PHPUnit\Framework\TestCase;
use maxlzp\algo\recursion\Euklid;

class EuklidTest extends TestCase
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
        $this->assertEquals($expected, Euklid::get($input[0], $input[1]));
    }

    public function factorialDataProvider()
    {
        return [
            [[1,1],1],
            [[2,1],1],
            [[2,2],2],
            [[2,3],1],
            [[1680,640],80],
        ];
    }
}
