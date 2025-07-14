<?php

declare(strict_types = 1);

namespace MaxLZp\Algo\Tests\Recursion;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Recursion\Ruler;

class RulerTest extends TestCase
{
    /**
     * @test
     */
    public function shouldDraw(): void
    {
        $this->assertEquals('010201030102010', Ruler::draw(3));
        $this->assertEquals('0102010301020104010201030102010', Ruler::draw(4));
    }
}
