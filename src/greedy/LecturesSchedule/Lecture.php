<?php

declare(strict_types=1);

namespace maxlzp\algo\greedy\LecturesSchedule;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;

class Lecture
{
    public static $DEFAULT_DURATION = 'PT45M';

    public DateInterval $duration;

    public function __construct(
        public string $title,
        public DateTimeInterface $start,
        ?DateInterval $duration = null
    ) {
        $this->duration = $duration ?? new DateInterval(self::$DEFAULT_DURATION);
    }

    public function __get(string $name): mixed
    {
        switch ($name) {
            case 'ending': return $this->ending();
        }
        throw new \InvalidArgumentException('Property not found');
    }

    public function ending(): DateTimeInterface
    {
        return DateTimeImmutable::createFromInterface($this->start)->add($this->duration);
    }

    public function __toString(): string
    {
        return sprintf('%1$s (%2$s)', $this->title, $this->duration->format('%i min'));
    }
}
