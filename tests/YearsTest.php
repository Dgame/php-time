<?php

use Dgame\Time\Unit\Days;
use function Dgame\Time\Unit\days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use function Dgame\Time\Unit\months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use function Dgame\Time\Unit\years;
use PHPUnit\Framework\TestCase;

class YearsTest extends TestCase
{
    public function testYears(): void
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

    public function testAdd(): void
    {
        $this->assertTrue(years(1)->add(years(0.5))->equals(months(18)));
        $this->assertTrue(years(1.5)->add(years(0.25))->equals(months(21)));
        $this->assertTrue(years(1.5)->add(years(0.5))->equals(months(24)));
        $this->assertTrue(years(1.5)->add(years(3))->equals(years(4.5)));
        $this->assertTrue(years(6)->add(years(6))->equals(years(12)));
        $this->assertTrue(years(0.5)->add(years(0.5))->equals(days(365)));
    }

    public function testSub(): void
    {
        $this->assertTrue(years(1)->subtract(years(0.5))->equals(months(6)));
        $this->assertTrue(years(1.5)->subtract(years(0.25))->equals(months(15)));
        $this->assertTrue(years(1.5)->subtract(years(0.5))->equals(months(12)));
        $this->assertTrue(years(4.5)->subtract(years(3))->equals(years(1.5)));
        $this->assertTrue(years(6)->subtract(years(6))->equals(years(0)));
        $this->assertTrue(years(1.5)->subtract(years(0.5))->equals(days(365)));
    }
}