<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\graphs;

use maxlzp\algo\graphs\breadthSearch\BreadthSearch;
use PHPUnit\Framework\TestCase;
use maxlzp\algo\graphs\breadthSearch\Node;

class BreadthSearchTest extends TestCase
{
    public function setup(): void
    {

    }

    /**
     * @test
     */
    public function demo()
    {
        $node1 = new Node('QWER');
        $node2 = new Node('ASDF');
        $node3 = new Node('ZXCV');
        $node4 = new Node('POUI');
        $node5 = new Node('LKJH');
        $node6 = new Node('MVNVC', true);

        $node1->friends[] = $node2;
        $node1->friends[] = $node3;

        $node2->friends[] = $node3;
        $node2->friends[] = $node4;

        $node3->friends[] = $node5;
        $node3->friends[] = $node6;

        $rootNode = $node1;

        $suitable = BreadthSearch::search($rootNode);
        $this->assertNotNull($suitable);
        $this->assertEquals('MVNVC', $suitable->name);
    }

    /**
     * @test
     */
    public function demo2()
    {
        $node1 = new Node('QWER');
        $node2 = new Node('ASDF');
        $node3 = new Node('ZXCV');
        $node4 = new Node('POUI', true);
        $node5 = new Node('LKJH');
        $node6 = new Node('MVNVC', true);

        $node1->friends[] = $node2;
        $node1->friends[] = $node3;

        $node2->friends[] = $node3;
        $node2->friends[] = $node4;

        $node3->friends[] = $node5;
        $node3->friends[] = $node6;

        $rootNode = $node1;

        $suitable = BreadthSearch::search($rootNode);
        $this->assertNotNull($suitable);
        $this->assertEquals('POUI', $suitable->name);
    }

}
