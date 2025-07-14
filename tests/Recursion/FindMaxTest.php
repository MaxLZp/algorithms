<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Tests\Recursion;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Recursion\FindMax;

class FindMaxTest extends TestCase
{
    /**
     * @test
     */
    public function shouldFind(): void
    {
        $this->assertEquals(3, FindMax::find([1,2,3]));
        $this->assertEquals(3, FindMax::find([-1,2,3]));
        $this->assertEquals(20,FindMax::find([1,20,3]));
    }
}
