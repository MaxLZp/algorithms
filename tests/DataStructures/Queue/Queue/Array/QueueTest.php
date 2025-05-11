<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\DataStructures\Queue\Queue\Array;

use PHPUnit\Framework\TestCase;
use MaxLZp\Algo\DataStructures\Queue\Queue\Array\Queue;
use RuntimeException;

final class QueueTest extends TestCase
{
    public function testQueueDemo(): void
    {
        echo __METHOD__.PHP_EOL;

        $queue = new Queue(3);
        $queue->show();
        $i = 0;
        while(!$queue->isFull()) {
            $queue->put(++$i);
            $queue->show();
        }
        while(!$queue->isEmpty()) {
            echo 'Got: '.$queue->get().PHP_EOL;
            $queue->show();
        }

        echo '------------------'.PHP_EOL;
        $i = 0;
        while(!$queue->isFull()) {
            $queue->put(++$i);
        }
        $queue->get();
        $queue->put(++$i);
        $queue->show();
        echo '================'.PHP_EOL;

        $this->markTestSkipped();
    }

    public function testQueueFull(): void
    {
        echo __METHOD__.PHP_EOL;
        $this->expectException(RuntimeException::class);

        try {
            $queue = new Queue(3);
            $queue->show();
            $i = 0;
            while(!$queue->isFull()) {
                $queue->put(++$i);
                $queue->show();
            }
            $queue->put(4);
            $queue->show();
        } catch (\Throwable $th) {
            echo 'Queue error: '.$th->getMessage().PHP_EOL;
            throw $th;
        }
    }


    public function testQueueEmpty(): void
    {
        echo __METHOD__.PHP_EOL;
        $this->expectException(RuntimeException::class);

        try {
            $queue = new Queue(3);
            $queue->show();
            $i = 0;
            while(!$queue->isFull()) {
                $queue->put(++$i);
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
