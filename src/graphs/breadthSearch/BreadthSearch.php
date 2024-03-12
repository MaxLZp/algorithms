<?php

declare(strict_types=1);

namespace maxlzp\algo\graphs\breadthSearch;

use maxlzp\algo\graphs\breadthSearch\Result;

class BreadthSearch
{
    /**
     * Search for suitable node
     *
     * @param  Node $node
     * @return Result
     */
    public static function search(Node $node): Result
    {
        $queue = [$node];
        $searched = [];
        $parents = [];
        $result = new Result();

        while($item = array_shift($queue)) {
            if (in_array($item, $searched)) {
                continue;
            }
            $searched[] = $item;
            if ($item->suitable) {
                $result->suitable = $item;
                break;
            }
            foreach ($item->friends as $friend) {
                $queue[] = $friend;
                $parents[$friend->name][] = $item;
            }
        }

        if ($result->suitable) {
            $result->path[] = $result->suitable;
            $step = array_shift($parents[$result->suitable->name]);
            while($step) {
                array_unshift($result->path, $step);
                $step = (isset($parents[$step->name])) ? $parents[$step->name][0] : null;
            }
        }

        return $result;
    }
}
