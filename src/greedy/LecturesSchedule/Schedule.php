<?php

declare(strict_types=1);

namespace MaxLZp\Algo\Greedy\LecturesSchedule;

use DateTimeInterface;

class Schedule
{
    /** @var Lecture[] $lectures */
    public array $lectures = [];

    /**
     * Attend maximum number of lectures
     *
     * @param  array             $lectures
     * @param  DateTimeInterface $since
     * @return self
     */
    public static function maxAttend(array $lectures, DateTimeInterface $since): self
    {
        $schedule = new Schedule();
        $schedule->lectures = array_merge(
            $schedule->lectures,
            self::buildMaxAttend(array_filter($lectures, function ($lecture) use($since){
                return $lecture->start >= $since;
            }))
        );
        return $schedule;
    }

    /**
     * Build schedule to attend maximum number of lectures
     *
     * @param  Lecture[] $lectures
     * @return Lecture[]
     */
    private static function buildMaxAttend(array $lectures): array
    {
        if (! count($lectures)) { return []; }

        // Find lectures that ends earliest
        $lectureEndEarliest = array_shift($lectures);
        foreach ($lectures as $item) {
            if ($item->ending < $lectureEndEarliest->ending) {
                $lectureEndEarliest = $item;
            }
        }
        if (! $lectureEndEarliest) { return []; }

        // filter out lectures starting before the lecture that ends earliest ends
        $lectures = array_filter($lectures, function($lecture) use ($lectureEndEarliest) {
            return $lecture->start >= $lectureEndEarliest->ending;
        });

        return array_merge([$lectureEndEarliest], self::buildMaxAttend($lectures));
    }
}
