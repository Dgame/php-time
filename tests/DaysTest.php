<?php

use Dgame\Time\Unit\Days;
use function Dgame\Time\Unit\days;
use Dgame\Time\Unit\Hours;
use function Dgame\Time\Unit\hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use function Dgame\Time\Unit\years;
use PHPUnit\Framework\TestCase;

class DaysTest extends TestCase
{
    public function testDays(): void
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

    public function testAdd(): void
    {
        $this->assertTrue(days(1)->add(hours(24))->equals(days(2)));
        $this->assertTrue(days(1.5)->add(hours(24))->equals(days(2.5)));
        $this->assertTrue(days(1.5)->add(hours(12))->equals(days(2)));
        $this->assertTrue(days(364)->add(hours(12))->equals(days(364.5)));
        $this->assertTrue(days(364)->add(hours(24))->equals(years(1)));
        $this->assertTrue(days(364.5)->add(hours(12))->equals(years(1)));
    }

    public function testSub(): void
    {
        $this->assertTrue(days(1)->subtract(hours(24))->equals(days(0)));
        $this->assertTrue(days(1.5)->subtract(hours(24))->equals(days(0.5)));
        $this->assertTrue(days(1.5)->subtract(hours(12))->equals(days(1)));
        $this->assertTrue(days(364)->subtract(hours(12))->equals(days(363.5)));
        $this->assertTrue(days(364)->subtract(hours(24))->equals(days(363)));
        $this->assertTrue(days(364.5)->subtract(hours(12))->equals(days(364)));
        $this->assertTrue(days(370)->subtract(days(5))->equals(years(1)));
    }
}