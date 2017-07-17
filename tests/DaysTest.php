<?php

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;

class DaysTest extends TestCase
{
    public function testDays()
    {
        foreach (range(1, 365) as $day) {
            $this->assertTrue(days($day)->inYears()->equalsAmount($day / Days::DAYS_PER_YEAR));
            $this->assertTrue(days($day)->inMonths()->equalsAmount($day / Days::DAYS_PER_MONTH));
            $this->assertTrue(days($day)->inWeeks()->equalsAmount($day / Days::DAYS_PER_WEEK));
            $this->assertTrue(days($day)->inDays()->equalsAmount($day));
            $this->assertTrue(days($day)->inHours()->equalsAmount($day * Hours::HOURS_PER_DAY));
            $this->assertTrue(days($day)->inMinutes()->equalsAmount($day * Minutes::MINUTES_PER_DAY));
            $this->assertTrue(days($day)->inSeconds()->equalsAmount($day * Seconds::SECONDS_PER_DAY));
        }
    }
}