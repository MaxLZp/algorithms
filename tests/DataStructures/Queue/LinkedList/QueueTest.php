<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\DataStructures\Queue\LinkedList;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\DataStructures\Queue\LinkedList\Queue;
use RuntimeException;

final class QueueTest extends TestCase
{
    public function testQueueDemo(): void
    {
        echo __METHOD__.PHP_EOL;

        $queue = new Queue();
        $queue->show();
        for ($i = 0; $i < 10; $i++) {
            $queue->put($i);
            $queue->show();
        }

        while(!$queue->isEmpty()) {
            echo 'Got: '.$queue->get().PHP_EOL;
            $queue->show();
        }

        echo '------------------'.PHP_EOL;
        $queue->show();
        for ($i = 0; $i < 10; $i++) {
            $queue->put($i);
            $queue->show();
        }
        $queue->get();
        $queue->show();
        $queue->put(++$i);
        $queue->show();
        echo '================'.PHP_EOL;

        $this->markTestSkipped();
    }

    public function testQueueEmpty(): void
    {
        echo __METHOD__.PHP_EOL;
        $this->expectException(RuntimeException::class);

        try {
            $queue = new Queue();
            $queue->show();
            for ($i = 0; $i < 10; $i++) {
                $queue->put($i);
                $queue->show();
            }

            while(!$queue->isEmpty()) {
                echo $queue->get().PHP_EOL;
                $queue->show();
            }
            $queue->get();
            $queue->show();
        } catch (\Throwable $th) {
            echo 'Queue error: '.$th->getMessage().PHP_EOL;
            throw $th;
        }
    }
}
