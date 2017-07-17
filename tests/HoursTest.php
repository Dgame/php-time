<?php

use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\hours;

class HoursTest extends TestCase
{
    public function testHours()
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
}