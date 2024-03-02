<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\search;

use maxlzp\algo\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProviderShouldFindIndex
     * @param  array  $haystack
     * @param  int    $needle
     * @param  array  $expected
     * @return boolean
     */
    public function shouldFindIndex($haystack, $needle, $expected)
    {
        $this->assertEquals($expected, BinarySearch::search($needle, $haystack)->result);
    }

    public function dataProviderShouldFindIndex()
    {
        return [
            [[0, 1], 1, 1],
            [[0, 1], 0, 0],
            [[0, 1, 2], 1, 1],
            [[0, 1, 2], 2, 2],
            [range(0, 100), 50, 50],
            [range(1, 100), 50, 49],
            [range(50, 100), 50, 0],
            [range(50, 60), 55, 5],
        ];
    }

    /**
     * @test
     * @dataProvider dataProviderShouldNotFindIndex
     * @param  array  $haystack
     * @param  int    $needle
     * @return boolean
     */
    public function shouldNotFindIndex($haystack, $needle)
    {
        $this->assertNull(BinarySearch::search($needle, $haystack)->result);
    }

    public function dataProviderShouldNotFindIndex()
    {
        return [
            [[], 1],
            [[0, 1], 2],
            [range(30, 40), 2],
        ];
    }
}
