<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue\LinkedList;

use MaxLZp\Algo\DataStructures\Queue\QueueInterface;

class Queue implements QueueInterface
{
    private ?Node $front = null;
    private ?Node $rear = null;

    public function put($value): void
    {
        $new = new Node($value);
        if ($this->isEmpty()) {
            $this->front = $new;
            $this->rear = $new;
        } else {
            $this->rear->next = $new;
            $this->rear = $this->rear->next;
        }
    }

    public function get(): mixed
    {
        if ($this->isEmpty()) {
            $this->rear = null;
            throw new \RuntimeException('Queue is empty.');
        }

        $front = $this->front;
        $frontValue = $this->front->value;
        $this->front = $this->front->next;
        unset($front);

        return $frontValue;
    }

    public function isEmpty(): bool
    {
        return !$this->front;
    }

    public function show(): void
    {
        $node = $this->front;
        while($node) {
            echo $node->value.($node->next ? '-' : '');
            $node = $node->next;
        }
        echo PHP_EOL;
    }
}
