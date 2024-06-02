<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Greedy\LecturesSchedule;

class ScheduleView
{
    private int $dateTimeWidth    = 20;
    private int $descriptionWidth = 40;

    public function __construct(private Schedule $schedule)
    {
    }

    public function draw(): void
    {
        $divider = $this->createLine(str_repeat('-', $this->dateTimeWidth), str_repeat('-', $this->descriptionWidth));
        $lines = [
            "",
            $divider,
            $this->createLine('Date/Time', 'Description'),
            $divider,
        ];

        foreach ($this->schedule->lectures as $lecture) {
            $lines[] = $this->createLine($lecture->start->format('Y.m.d H:i'), (string)$lecture);
        }
        $lines[] = $divider;
        $lines[] = '';

        echo implode("\n", $lines);
    }

    private function createLine(string $col1, string $col2): string
    {

        return sprintf('|%1$-'.$this->dateTimeWidth.'s|%2$-'.$this->descriptionWidth.'s|', $col1, $col2);
    }
}
