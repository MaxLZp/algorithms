<?php

declare(strict_types=1);

require 'src/bootstrap.php';

use MaxLZp\Algo\Search\BinarySearch;

$options = getopt('s:', ['start::', 'end::', 'step::']);
$search = isset($options['s']) ? (int)$options['s'] : 10;

$result = BinarySearch::search(
    $search,
    BinarySearch::generateHaystack(
        isset($options['start']) ? (int)$options['start'] : 0,
        isset($options['end']) ? (int)$options['end'] : 100,
        isset($options['step']) ? (int)$options['step'] : 1
    )
);

echo $result->result
    ? sprintf('%s found at %d in %d steps.', $search, $result->result, $result->steps)
    : sprintf('%s NOT found; %d steps.', $search, $result->steps);
