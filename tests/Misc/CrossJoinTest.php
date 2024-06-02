<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Misc;

use MaxLZp\Algo\Misc\CrossJoin;
use PHPUnit\Framework\TestCase;

class CrossJoinTest extends TestCase
{
    public function testShouldJoin(): void
    {
        $result = CrossJoin::join([0, 1], [2], [3, 4]);
        $this->assertTrue(true);
    }
}
