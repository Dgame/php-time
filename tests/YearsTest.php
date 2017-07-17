<?php

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\years;

class YearsTest extends TestCase
{
    public function testYears()
    {
        foreach (range(1, 12) as $year) {
            $this->assertTrue(years($year)->inYears()->equalsAmount($year));
            $this->assertTrue(years($year)->inMonths()->equalsAmount($year * Months::MONTHS_PER_YEAR));
            $this->assertTrue(years($year)->inWeeks()->equalsAmount($year * Weeks::WEEKS_PER_YEAR));
            $this->assertTrue(years($year)->inDays()->equalsAmount($year * Days::DAYS_PER_YEAR));
            $this->assertTrue(years($year)->inHours()->equalsAmount($year * Hours::HOURS_PER_YEAR));
            $this->assertTrue(years($year)->inMinutes()->equalsAmount($year * Minutes::MINUTES_PER_YEAR));
            $this->assertTrue(years($year)->inSeconds()->equalsAmount($year * Seconds::SECONDS_PER_YEAR));
        }
    }
}