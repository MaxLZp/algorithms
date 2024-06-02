<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Graphs;

use MaxLZp\Algo\Graphs\BreadthSearch\BreadthSearch;
use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Graphs\BreadthSearch\Node;

class BreadthSearchTest extends TestCase
{
    public function setup(): void
    {

    }

    /**
     * @test
     */
    public function demo(): void
    {
        /*
             2 - 4
        1 < \/
             3 - 5
               \ 6*
        */

        $node1 = new Node('1');
        $node2 = new Node('2');
        $node3 = new Node('3');
        $node4 = new Node('4');
        $node5 = new Node('5');
        $node6 = new Node('6', true);

        $node1->friends[] = $node2;
        $node1->friends[] = $node3;

        $node2->friends[] = $node3;
        $node2->friends[] = $node4;

        $node3->friends[] = $node5;
        $node3->friends[] = $node6;

        $rootNode = $node1;

        $result = BreadthSearch::search($rootNode);
        $this->assertNotNull($result->suitable);
        $this->assertEquals('6', $result->suitable->name);
        $this->assertNotEmpty($result->pathString());
        $this->assertEquals('1 -- 3 -- 6', $result->pathString());
    }

    /**
     * @test
     */
    public function demo2(): void
    {
        /*
             2 - 4*
        1 < \/
             3 - 5
               \ 6*
        */
        $node1 = new Node('1');
        $node2 = new Node('2');
        $node3 = new Node('3');
        $node4 = new Node('4', true);
        $node5 = new Node('5');
        $node6 = new Node('6', true);

        $node1->friends[] = $node2;
        $node1->friends[] = $node3;

        $node2->friends[] = $node3;
        $node2->friends[] = $node4;

        $node3->friends[] = $node5;
        $node3->friends[] = $node6;

        $rootNode = $node1;

        $result = BreadthSearch::search($rootNode);
        $this->assertNotNull($result->suitable);
        $this->assertEquals('4', $result->suitable->name);
        $this->assertNotEmpty($result->pathString());
        $this->assertEquals('1 -- 2 -- 4', $result->pathString());
    }

}
