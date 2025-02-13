<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Tests\Misc\FilterInput;

final class FilterInputStructure
{
    public function filter(array $fields, array $data): array
    {
        $filtered = array();
        foreach ($fields as $key => $value) {
            if (is_array($value) && is_array($data[$key])) {
                $filtered[$key] = $this->filter($fields[$key], $data[$key]);
            } elseif (!is_array($value) && !is_array($data[$value])) {
                $filtered[$value] = $data[$value];
            }
        }

        return $filtered;
    }
}
