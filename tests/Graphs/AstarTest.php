<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Graphs;

use MaxLZp\Algo\Graphs\Astar\Astar;
use MaxLZp\Algo\Graphs\Astar\Field;
use MaxLZp\Algo\Graphs\Astar\Point;
use MaxLZp\Algo\Graphs\Astar\PointsList;
use PHPUnit\Framework\TestCase;

final class AstarTest extends TestCase
{

    public function testAstarOne(): void
    {
        /*
            s - start
            w - wall
            e - end
            + - path

            s - -
            - w -
            - - e


            Shortest Path:
            s + +
            - w +
            - - e
        */
        
        $walls = new PointsList();
        $walls->add(new Point(1, 1));
        $field = new Field(3, 3, $walls);
        $start = new Point(0, 0);
        $end = new Point(2, 2);


        $shortestPath = Astar::find($field, $start, $end);

        $p1 = new Point(0, 0, null, 0, 4, 4);
        $p2 = new Point(0, 1, $p1, 1, 3, 4);
        $p3 = new Point(0, 2, $p2, 2, 2, 4);
        $p4 = new Point(1, 2, $p3, 3, 1, 4);
        $p5 = new Point(2, 2, $p4, 4, 0, 4);
        $this->assertEquals([
            $p1,
            $p2,
            $p3,
            $p4,
            $p5,
        ], $shortestPath);
    }

    public function testAstarTwo(): void
    {
        /*
            s - start
            w - wall
            e - end
            + - path

            - - - - -
            s - w - e
            - - - - -
            
            
            Shortest Path:
            - + + + -
            s + w + e
            - - - - -
        */
        
        $walls = new PointsList();
        $walls->add(new Point(1, 2));
        $field = new Field(5, 3, $walls);
        $start = new Point(1, 0);
        $end = new Point(1, 4);


        $shortestPath = Astar::find($field, $start, $end);

        $p1 = new Point(1, 0, null, 0, 4, 4);
        $p2 = new Point(1, 1, $p1, 1, 3, 4);
        $p3 = new Point(0, 1, $p2, 2, 4, 6);
        $p4 = new Point(0, 2, $p3, 3, 3, 6);
        $p5 = new Point(0, 3, $p4, 4, 2, 6);
        $p6 = new Point(0, 4, $p5, 5, 1, 6);
        $p7 = new Point(1, 4, $p6, 6, 0, 6);
        $this->assertEquals([
            $p1,
            $p2,
            $p3,
            $p4,
            $p5,
            $p6,
            $p7,
        ], $shortestPath);
    }

}
