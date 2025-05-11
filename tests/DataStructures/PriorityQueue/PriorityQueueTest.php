<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\DataStructures\PriorityQueue;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\DataStructures\Queue\PriorityQueue\PriorityQueue;

final class PriorityQueueTest extends TestCase
{
    public function testPriorityQueue(): void
    {
        $queue = PriorityQueue::create();

        $queue->put('value3', 3);
        $queue->put('value5', 5);
        $queue->put('value1', 1);
        $queue->put('value4', 4);
        $queue->put('value2', 2);
        $queue->put('value22', 2);

        $result = [];
        while(!$queue->isEmpty()) {
            $result[] = $queue->get()->getValue();
        }

        $this->assertEquals(['value5','value4','value3','value22','value2','value1'], $result);
    }
}
