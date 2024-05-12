<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Dynamic\BubbleSortRecursive;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Sorting\SortDirection;
use MaxLZp\Algo\Dynamic\BubbleSortRecursive\BubbleSortRecursive;

class BubbleSortRecursiveTest extends TestCase
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
        $result = BubbleSortRecursive::sort($input);
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
        $result = BubbleSortRecursive::sort($input, SortDirection::DESC);
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
