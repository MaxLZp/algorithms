<?php

declare(strict_types=1);

namespace maxlzp\algo\tests\greedy\classes;

use DateTime;
use PHPUnit\Framework\TestCase;
use maxlzp\algo\greedy\LecturesSchedule\Lecture;
use maxlzp\algo\greedy\LecturesSchedule\Schedule;
use maxlzp\algo\greedy\LecturesSchedule\ScheduleView;

final class ScheduleTest extends TestCase
{
    /**
     * @test
     * @dataProvider lecturesDataProvider
     */
    public function shouldArrangeClasses($lectures, $since, $duration, $expectedCount): void
    {
        $schedule = Schedule::maxAttend($lectures, $since);

        $this->assertNotNull($schedule);
        $this->assertEquals($expectedCount, count($schedule->lectures));

        $view = new ScheduleView($schedule);
        $view->draw();
    }

    public function lecturesDataProvider(): array
    {
        $lectures = [
            new Lecture('Algebra', DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 08:00')),
            new Lecture('Physics', DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 09:00')),
            new Lecture('History', DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 08:30')),
            new Lecture('Arts', DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 09:30')),
            new Lecture('Geometry', DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 10:30')),
            new Lecture('Algebra 2', DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 10:00')),
        ];

        return [
            [$lectures, DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 08:00'), 3],
            [$lectures, DateTime::createFromFormat('Y.m.d H:i', '2024.03.15 09:30'), 2],
        ];
    }
}
