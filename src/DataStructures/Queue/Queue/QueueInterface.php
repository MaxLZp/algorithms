<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue\Queue;

interface QueueInterface
{
    public function put(mixed $value): void;

    public function get(): mixed;

    public function isEmpty(): bool;

    public function show(): void;
}
