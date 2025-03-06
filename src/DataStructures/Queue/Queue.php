<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue;

final class Queue
{
    private int $ptr = -1;

    /** @var array<int, int> */
    private array $queue;

    public function __construct(public readonly int $size)
    {
        $this->queue = array_fill(0, $size, null);
    }

    public function put(int $value): void
    {
        if ($this->isFull()) {
            throw new \RuntimeException('Queue is full');
        }
        $this->queue[++$this->ptr] = $value;
    }

    public function get(): int
    {
        if ($this->isEmpty()) {
            throw new \RuntimeException('Queue is empty');
        }

        $val = $this->queue[0];
        for ($i = 0; $i < $this->ptr; $i++) {
            $this->queue[$i] = $this->queue[$i + 1];
        }
        $this->queue[$this->ptr--] = null;

        return $val;
    }

    public function isFull(): bool
    {
        return $this->ptr + 1 >= $this->size;
    }

    public function isEmpty(): bool
    {
        return $this->ptr < 0;
    }

    public function show(): void
    {
        var_export(implode(' <-> ', $this->queue));
        echo PHP_EOL;
    }
}
