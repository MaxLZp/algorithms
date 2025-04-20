<?php

declare(strict_types=1);

namespace MaxLZp\Algo\DataStructures\Queue\LinkedList;

final class Node
{
    public ?Node $next = null;

    public function __construct(public mixed $value)
    {
    }
}
