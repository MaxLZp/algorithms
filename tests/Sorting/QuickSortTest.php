<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Sorting;

use MaxLZp\Algo\Sorting\QuickSort;
use MaxLZp\Algo\Sorting\SortDirection;
use PHPUnit\Framework\TestCase;

class QuickSortTest extends TestCase
{
    /**
     * @test
     * @dataProvider sortingProviderAsc
     * @param  array $input
     * @param  array $expected
     * @return void
     */
    public function shouldSortAsc($input, $expected): void
    {
        $result = QuickSort::sort($input);
        foreach ($expected as $key => $value) {
            $this->assertEquals($expected[$key], $result[$key]);
        }
    }

    public function sortingProviderAsc(): array
    {
        return [
            [
                [1,2,3,4,5],
                [1,2,3,4,5],
            ],
            [
                [1,3,2,5,4],
                [1,2,3,4,5],
            ],
            [
                [5,4,3,2,1],
                [1,2,3,4,5],
            ],
            [
                [23,4,5],
                [4,5,23],
            ],
            [
                [5,4,12, 3, 23,2,1],
                [1,2,3,4,5,12,23],
            ],
        ];
    }

    /**
     * @test
     * @dataProvider sortingProviderDesc
     * @param  array $input
     * @param  array $expected
     * @return void
     */
    public function shouldSortDesc($input, $expected): void
    {
        $result = QuickSort::sort($input, SortDirection::DESC);
        foreach ($expected as $key => $value) {
            $this->assertEquals($expected[$key], $result[$key]);
        }
    }

    public function sortingProviderDesc(): array
    {
        return [
            [
                [1,2,3,4,5],
                [5,4,3,2,1],
            ],
            [
                [1,3,2,5,4],
                [5,4,3,2,1],
            ],
            [
                [5,4,3,2,1],
                [5,4,3,2,1],
            ],
            [
                [23,4,5],
                [23,5,4],
            ],
            [
                [5,4,12, 3, 23,2,1],
                [23,12,5,4,3,2,1],
            ],
        ];
    }
}
