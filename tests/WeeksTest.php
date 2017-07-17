<?php

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\weeks;

class WeeksTest extends TestCase
{
    public function testWeeks()
    {
        foreach (range(1, 104) as $weeks) {
            $this->assertTrue(weeks($weeks)->inSeconds()->equalsAmount($weeks * Seconds::SECONDS_PER_WEEK));
            $this->assertTrue(weeks($weeks)->inMinutes()->equalsAmount($weeks * Minutes::MINUTES_PER_WEEK));
            $this->assertTrue(weeks($weeks)->inHours()->equalsAmount($weeks * Hours::HOURS_PER_WEEK));
            $this->assertTrue(weeks($weeks)->inDays()->equalsAmount($weeks * Days::DAYS_PER_WEEK));
            $this->assertTrue(weeks($weeks)->inWeeks()->equalsAmount($weeks));
            $this->assertTrue(weeks($weeks)->inMonths()->equalsAmount($weeks / Weeks::WEEKS_PER_MONTH));
            $this->assertTrue(weeks($weeks)->inYears()->equalsAmount($weeks / Weeks::WEEKS_PER_YEAR));
        }
    }
}