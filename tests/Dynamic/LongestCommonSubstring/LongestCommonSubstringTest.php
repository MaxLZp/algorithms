<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Dynamic\LongestCommonSubstring;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Dynamic\LongestCommonSubstring\LongestCommonSubstring;

class LongestCommonSubstringTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param  string $expected
     * @param  string $input1
     * @param  string $input2
     * @return void
     */
    public function testShouldFind($expected, $input1, $input2)
    {
        $this->assertEquals($expected, LongestCommonSubstring::find($input1, $input2));
    }

    public function dataProvider(): array
    {
        return [
            ['ish', 'fish', 'hish'],
            ['car', 'car', 'car'],
            ['car', 'carwash', 'carlson'],
            ['nation', 'international', 'pnationp'],
            ['', 'asdf', 'zxcv'],
            ['a', 'a', 'a'],
        ];
    }
}
