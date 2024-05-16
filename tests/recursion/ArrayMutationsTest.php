<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Recursion;

use MaxLZp\Algo\Recursion\ArrayMutations;
use PHPUnit\Framework\TestCase;

final class ArrayMutationsTest extends TestCase
{
    /**
     * @test
     * @dataProvider mutationsProvider
     * @param  array $input
     * @param  array $expected
     * @return void
     */
    public function shouldGetMutations(array $input, array $expected): void
    {
        $this->assertSame($expected, ArrayMutations::mutate($input));
    }

    public function mutationsProvider(): array
    {
        return [
            [[], []],
            [[1], [[1]]],
            [[1, 2], [[1, 2], [2, 1]]],
            [[1, 2, 3], [
                [1, 2, 3],
                [2, 1, 3],
                [2, 3, 1],
                [1, 3, 2],
            ]],
        ];
    }
}
