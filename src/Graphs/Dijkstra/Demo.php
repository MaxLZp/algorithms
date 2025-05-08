<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Graphs\Dijkstra;

final class Demo
{

    public function demo(): void
    {
        $graph = [
            'start' => [
                'a' => 6,
                'b' => 2,
            ],
            'a' => [
                'finish' => 1
            ],
            'b' => [
                'a' => 3,
                'finish' => 5,
            ],
            'finish' => [],
        ];

        $costs = [
            'a' => 6,
            'b' => 2,
            'finish' => PHP_FLOAT_MAX,
        ];

        $parents = [
            'a' => 'start',
            'b' => 'start',
            'finish' => ''
        ];

        $processed = [];

        $node = $this->findClosest($costs);
        while($node) {
            $cost = $costs[$node];
            $neighbours = $graph[$node];
            foreach ($neighbours as $key => $value) {
                $newCost = $cost + $value;
                if ($newCost < $costs[$key]) {
                    $costs[$key] = $newCost;
                    $parents[$key] = $node;
                }
            }
            $processed[] = $node;
            $node = $this->findClosest($costs, $processed);
        }

        $path = 'finish';
        $node = $parents[$path];
        while($node != 'start') {
            $path = $node.'->'.$path;
            $node = $parents[$node];
        }
        $path = 'start'.$path;
        print_r($costs['finish']);
        print_r($path);
    }

    /**
     *
     * @param array<string, mixed> $neighbours
     * @param array<mixed> $processed
     * @return mixed
     */
    private function findClosest(array $neighbours, array $processed = []): mixed
    {
        $node = null;
        foreach ($neighbours as $name => $cost) {
            if (in_array($name, $processed)) { continue; }
            if ($cost && ! $node) {
                $node = $name;
                continue;
            }
            if ($cost && $cost < $neighbours[$node]) {
                $node = $name;
            }
        }
        return $node;
    }
}
