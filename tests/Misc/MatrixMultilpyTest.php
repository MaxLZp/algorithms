<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Misc;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Misc\Matrix\Matrix;

final class MatrixMultilpyTest extends TestCase
{
    public function testMultiply(): void
    {
        $this->assertSame(
            [
                [28, 34],
                [64, 79],
            ],
            Matrix::multiply(
                [
                    [1, 2, 3],
                    [4, 5, 6],
                ], [
                    [2, 3],
                    [4, 5],
                    [6, 7],
                ]
            )
        );
    }
}
