<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Graphs;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\Graphs\Dijkstra\Node;
use MaxLZp\Algo\Graphs\Dijkstra\Dijkstra;

final class DijkstraTest extends TestCase
{

    public function testDijkstraSearchOne(): void
    {
        /*
              7        10
          A ------ B ------ C
           \       |        |
          3 \     4|        |6
             \     |        |
              D ----------- E
                 9
        */
        $graph = [];
        $graph[] = $a = new Node('A');
        $graph[] = $b = new Node('B');
        $graph[] = $c = new Node('C');
        $graph[] = $d = new Node('D');
        $graph[] = $e = new Node('E');

        $a->addNeighbor($b, 7)
            ->addNeighbor($d, 3);

        $b->addNeighbor($a, 7)
            ->addNeighbor($c, 10)
            ->addNeighbor($d, 4);

        $c->addNeighbor($b, 10)
            ->addNeighbor($e, 6);

        $d->addNeighbor($a, 3)
            ->addNeighbor($e, 9);

        $e->addNeighbor($c, 6)
            ->addNeighbor($d, 9);


        $shortestPath = Dijkstra::shortestPath($graph, $a, $e);

        $this->assertEquals('ADE', $shortestPath);
        $this->assertEquals(12, $e->cost);
    }

    public function testDijkstraSearchTwo(): void
    {
        /*
              7        10
          A ------ B ------ C
           \       |        |
          3 \     4|        |6
             \     |        |
              D ----------- E
               \     9     /
                \1       1/
                 \       /
                  \--F--/
        */
        $graph = [];
        $graph[] = $a = new Node('A');
        $graph[] = $b = new Node('B');
        $graph[] = $c = new Node('C');
        $graph[] = $d = new Node('D');
        $graph[] = $e = new Node('E');
        $graph[] = $f = new Node('F');

        $a->addNeighbor($b, 7)
            ->addNeighbor($d, 3);

        $b->addNeighbor($a, 7)
            ->addNeighbor($c, 10)
            ->addNeighbor($d, 4);

        $c->addNeighbor($b, 10)
            ->addNeighbor($e, 6);

        $d->addNeighbor($a, 3)
            ->addNeighbor($b, 4)
            ->addNeighbor($e, 9)
            ->addNeighbor($f, 1);

        $e->addNeighbor($c, 3)
            ->addNeighbor($d, 9)
            ->addNeighbor($f, 1);

        $f->addNeighbor($d, 1)
            ->addNeighbor($e, 1);

        $shortestPath = Dijkstra::shortestPath($graph, $a, $e);

        $this->assertEquals(5, $e->cost);
        $this->assertEquals('ADFE', $shortestPath);
    }

    public function testDijkstraSearchThree(): void
    {
        /*
              7        10      2
          A ------ B ------ C----G
           \       |        |   /
          3 \     4|        |6 /50
             \     |        | /
              D ----------- E
               \     9     /
                \1       1/
                 \       /
                  \--F--/
        */
        $graph = [];
        $graph[] = $a = new Node('A');
        $graph[] = $b = new Node('B');
        $graph[] = $c = new Node('C');
        $graph[] = $d = new Node('D');
        $graph[] = $e = new Node('E');
        $graph[] = $f = new Node('F');
        $graph[] = $g = new Node('G');

        $a->addNeighbor($b, 7)
            ->addNeighbor($d, 3);

        $b->addNeighbor($a, 7)
            ->addNeighbor($c, 10)
            ->addNeighbor($d, 4);

        $c->addNeighbor($b, 10)
            ->addNeighbor($e, 6)
            ->addNeighbor($g, 2);

        $d->addNeighbor($a, 3)
            ->addNeighbor($b, 4)
            ->addNeighbor($e, 9)
            ->addNeighbor($f, 1);

        $f->addNeighbor($d, 1)
            ->addNeighbor($e, 1);

        $e->addNeighbor($d, 9)
            ->addNeighbor($f, 1)
            ->addNeighbor($g, 50);

        $g->addNeighbor($c, 2)
            ->addNeighbor($e, 50);


        $shortestPath = Dijkstra::shortestPath($graph, $a, $g);

        $this->assertEquals(19, $g->cost);
        $this->assertEquals('ADBCG', $shortestPath);
    }

    public function testDijkstraSearchFour(): void
    {
        /*
              6        10      2
          A ------ B ------ C----G
           \       |        |   /
          3 \     4|        |6 /50
             \     |        | /
              D ----------- E
               \     9     /
                \1       1/
                 \       /
                  \--F--/
        */
        $graph = [];
        $graph[] = $a = new Node('A');
        $graph[] = $b = new Node('B');
        $graph[] = $c = new Node('C');
        $graph[] = $d = new Node('D');
        $graph[] = $e = new Node('E');
        $graph[] = $f = new Node('F');
        $graph[] = $g = new Node('G');

        $a->addNeighbor($b, 6)
            ->addNeighbor($d, 3);

        $b->addNeighbor($a, 6)
            ->addNeighbor($c, 10)
            ->addNeighbor($d, 4);

        $c->addNeighbor($b, 10)
            ->addNeighbor($e, 6)
            ->addNeighbor($g, 2);

        $d->addNeighbor($a, 3)
            ->addNeighbor($b, 4)
            ->addNeighbor($e, 9)
            ->addNeighbor($f, 1);

        $f->addNeighbor($d, 1)
            ->addNeighbor($e, 1);

        $e->addNeighbor($d, 9)
            ->addNeighbor($f, 1)
            ->addNeighbor($g, 50);

        $g->addNeighbor($c, 2)
            ->addNeighbor($e, 50);


        $shortestPath = Dijkstra::shortestPath($graph, $a, $g);

        $this->assertEquals(18, $g->cost);
        $this->assertEquals('ABCG', $shortestPath);
    }

}
