<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\sorting;

use maxlzp\algo\sorting\SelectionSort as SortingSelectionSort;
use maxlzp\algo\sorting\SortDirection;
use PHPUnit\Framework\TestCase;

class SelectionSortTest extends TestCase
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
        $result = SortingSelectionSort::sort($input);
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
        $result = SortingSelectionSort::sort($input, SortDirection::DESC);
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
        ];
    }
}
