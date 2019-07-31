<?php

use function Dgame\Time\Unit\days;
use Dgame\Time\Unit\Hours;
use function Dgame\Time\Unit\hours;
use Dgame\Time\Unit\Minutes;
use function Dgame\Time\Unit\minutes;
use Dgame\Time\Unit\Seconds;
use PHPUnit\Framework\TestCase;

class HoursTest extends TestCase
{
    public function testHours(): void
    {
        foreach (range(1, 72) as $hour) {
            $this->assertTrue(hours($hour)->inSeconds()->equalsAmount($hour * Seconds::SECONDS_PER_HOUR));
            $this->assertTrue(hours($hour)->inMinutes()->equalsAmount($hour * Minutes::MINUTES_PER_HOUR));
            $this->assertTrue(hours($hour)->inHours()->equalsAmount($hour));
            $this->assertTrue(hours($hour)->inDays()->equalsAmount($hour / Hours::HOURS_PER_DAY));
            $this->assertTrue(hours($hour)->inWeeks()->equalsAmount($hour / Hours::HOURS_PER_WEEK));
            $this->assertTrue(hours($hour)->inMonths()->equalsAmount($hour / Hours::HOURS_PER_MONTH));
            $this->assertTrue(hours($hour)->inYears()->equalsAmount($hour / Hours::HOURS_PER_YEAR));
        }
    }

    public function testAdd(): void
    {
        $this->assertTrue(hours(1)->add(minutes(60))->equals(hours(2)));
        $this->assertTrue(hours(1.5)->add(minutes(60))->equals(hours(2.5)));
        $this->assertTrue(hours(1.5)->add(minutes(30))->equals(hours(2)));
        $this->assertTrue(hours(23)->add(minutes(30))->equals(hours(23.5)));
        $this->assertTrue(hours(23.5)->add(minutes(30))->equals(days(1)));
    }

    public function testSub(): void
    {
        $this->assertTrue(hours(1)->subtract(minutes(60))->equals(hours(0)));
        $this->assertTrue(hours(1.5)->subtract(minutes(60))->equals(hours(0.5)));
        $this->assertTrue(hours(1.5)->subtract(minutes(30))->equals(hours(1)));
        $this->assertTrue(hours(23)->subtract(minutes(30))->equals(hours(22.5)));
        $this->assertTrue(hours(23.5)->subtract(minutes(30))->equals(hours(23)));
    }
}