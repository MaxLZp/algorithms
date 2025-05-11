<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue\PriorityQueue;

final class Node
{
    public ?Node $prev = null;

    public ?Node $next = null;

    public function __construct(
        private mixed $value,
        private int $priority = 1,
    ) {
    }

    public static function create(mixed $value, int $priority = 1): self
    {
        return new static($value, $priority);
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }
}
