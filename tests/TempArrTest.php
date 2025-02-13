<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests;

use MaxLZp\Algo\Tests\Misc\FilterInput\FilterInputStructure;
use PHPUnit\Framework\TestCase;

final class TempArrTest extends TestCase
{

    public function testCheck(): void
    {

        $struct = [
            'responsible' => ['name', 'phone', 'str'],
            'code',
            'str',
        ];
        $post = [
            'responsible' => [
                'name' => 'John',
                'phone' => '456',
                'str' => ['a' => 'A'],
            ],
            'code' => '123',
            'str' => ['asdf'],
            'crap' => 'dsgf',
        ];

        $filter = new FilterInputStructure();

        $filtered = $filter->filter($struct, $post);
        var_dump($filtered);
        $this->markTestSkipped('See var_dumpOutput');
    }

}
