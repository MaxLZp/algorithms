<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue\Array;

use MaxLZp\Algo\DataStructures\Queue\QueueInterface;

final class Queue implements QueueInterface
{
    private int $front = 0;
    private int $rear = 0;
    private $count = 0;

    /** @var array<int, int> */
    private array $queue;

    public function __construct(public readonly int $size = 5)
    {
        $this->queue = array_fill(0, $size, null);
    }

    public function put(mixed $value): void
    {
        if ($this->isFull()) {
            throw new \RuntimeException('Queue is full.');
        }
        $this->queue[$this->rear] = $value;
        $this->rear++;
        if ($this->rear == $this->size) {
            $this->rear = 0;
        }
        $this->count++;
    }

    public function get(): mixed
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('Queue is empty.');
        }
        $val = $this->queue[$this->front];
        $this->queue[$this->front++] = null;
        if ($this->front == $this->size) {
            $this->front = 0;
        }
        $this->count--;

        return $val;
    }

    public function isEmpty(): bool
    {
        return $this->count == 0;
    }

    public function isFull(): bool
    {
        return $this->count == $this->size;
    }


    public function show(): void
    {
        $array = array_merge(
            array_slice($this->queue, $this->front, ($this->front < $this->rear ? $this->rear - $this->front : null)),
            array_slice($this->queue, 0, ($this->rear <= $this->front ? $this->rear : 0))
        );

        echo implode('-', $array).PHP_EOL;
    }
}
