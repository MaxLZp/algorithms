<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Recursion;

use MaxLZp\Algo\Recursion\PrintTableRecursively;
use PHPUnit\Framework\TestCase;

final class PrintTableRecursivelyTest extends TestCase
{
    /**
     * @test
     * @param  integer $n
     * @return void
     */
    public function shouldPrintTableNonRecursively(): void
    {
        $this->doesNotPerformAssertions();

        echo PHP_EOL.'NonRecursive:'.PHP_EOL;
        PrintTableRecursively::printNonRecursive(10);
        echo PHP_EOL.'Recursive:'.PHP_EOL;
        PrintTableRecursively::printRecursive(10);

        $this->markTestSkipped();
    }
}
