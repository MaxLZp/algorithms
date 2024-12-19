<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Sorting;

use MaxLZp\Algo\Sorting\BubbleSort as SortingBubbleSort;
use MaxLZp\Algo\Sorting\SortDirection;
use PHPUnit\Framework\TestCase;

final class BubbleSortTest extends TestCase
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
        $result = SortingBubbleSort::sort($input);
        $this->assertSame($expected, $result);
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
        $result = SortingBubbleSort::sort($input, SortDirection::DESC);
        $this->assertSame($expected, $result);
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
