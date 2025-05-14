<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue\PriorityQueue;

final class PriorityQueue
{
    private ?Node $head = null;

    public static function create(): static
    {
        return new static();
    }

    public function isEmpty(): bool
    {
        return null === $this->head;
    }

    public function get(): Node
    {
        if (!$this->head) {
            throw new \RuntimeException('Queue is empty');
        }

        $head = $this->head;
        $this->head = $this->head->next;

        return $head;
    }

    public function put(mixed $value, int $priority = 1): void
    {
        $node = Node::create($value, $priority);
        if ($this->isEmpty()) {
            $this->head = $node;
            return;
        }

        $current = $this->head;
        $previous = null;
        while($current && $current->getPriority() > $node->getPriority()) {
            $previous = $current;
            $current = $current->next;
        }

        $node->prev = $previous;
        $node->next = $current;

        if ($previous) {
            $previous->next = $node;
        } else {
            // Insert as head when there is no prev node found
            $this->head = $node;
        }
        if ($current) {
            $current->prev = $node;
        }
    }
}
