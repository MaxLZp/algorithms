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

        $before = $this->head;
        $after = null;
        while($before && $before->getPriority() >= $node->getPriority()) {
            $after = $before;
            $before = $before->next;
        }

        $node->prev = $after;
        $node->next = $before;

        if ($after) {
            $after->next = $node;
        }
        if ($before) {
            $before->prev = $node;
        }
        if ($this->head == $before) {
            $this->head = $node;
        }
    }
}
