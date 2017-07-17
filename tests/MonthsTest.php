<?php

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\months;

class MonthsTest extends TestCase
{
    public function testMonths()
    {
        foreach (range(1, 24) as $month) {
            $this->assertTrue(months($month)->inSeconds()->equalsAmount($month * Seconds::SECONDS_PER_MONTH));
            $this->assertTrue(months($month)->inMinutes()->equalsAmount($month * Minutes::MINUTES_PER_MONTH));
            $this->assertTrue(months($month)->inHours()->equalsAmount($month * Hours::HOURS_PER_MONTH));
            $this->assertTrue(months($month)->inDays()->equalsAmount($month * Days::DAYS_PER_MONTH));
            $this->assertTrue(months($month)->inWeeks()->equalsAmount($month * Weeks::WEEKS_PER_MONTH));
            $this->assertTrue(months($month)->inMonths()->equalsAmount($month));
            $this->assertTrue(months($month)->inYears()->equalsAmount($month / Months::MONTHS_PER_YEAR));
        }
    }
}