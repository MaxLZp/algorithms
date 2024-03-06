<?php

declare(strict_types=1);

namespace maxlzp\algo\graphs\breadthSearch;

class BreadthSearch
{
    /**
     * Search for suitable node
     *
     * @param  Node $node
     * @return Node|null
     */
    public static function search(Node $node)
    {
        $queue = [$node];
        $searched = [];
        $suitable = null;

        while($item = array_shift($queue)) {
            if (in_array($item, $searched)) {
                continue;
            }
            $searched[] = $item;
            if (true == $item->suitable) {
                $suitable = $item;
                break;
            }
            foreach ($item->friends as $friend) {
                $queue[] = $friend;
            }
        }
        return $suitable;
    }
}
