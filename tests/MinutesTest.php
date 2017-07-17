<?php

use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\minutes;

class MinutesTest extends TestCase
{
    public function testMinutes()
    {
        foreach (range(1, 120) as $minute) {
            $this->assertTrue(minutes($minute)->inSeconds()->equalsAmount($minute * Seconds::SECONDS_PER_MINUTE));
            $this->assertTrue(minutes($minute)->inMinutes()->equalsAmount($minute));
            $this->assertTrue(minutes($minute)->inHours()->equalsAmount($minute / Minutes::MINUTES_PER_HOUR));
            $this->assertTrue(minutes($minute)->inDays()->equalsAmount($minute / Minutes::MINUTES_PER_DAY));
            $this->assertTrue(minutes($minute)->inWeeks()->equalsAmount($minute / Minutes::MINUTES_PER_WEEK));
            $this->assertTrue(minutes($minute)->inMonths()->equalsAmount($minute / Minutes::MINUTES_PER_MONTH));
            $this->assertTrue(minutes($minute)->inYears()->equalsAmount($minute / Minutes::MINUTES_PER_YEAR));
        }
    }
}