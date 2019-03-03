<?php

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\months;
use function Dgame\Time\Unit\years;

class MonthsTest extends TestCase
{
    public function testMonths(): void
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

    public function testAdd(): void
    {
        $this->assertTrue(months(1)->add(years(0.5))->equals(months(7)));
        $this->assertTrue(months(1.5)->add(years(0.25))->equals(months(4.5)));
        $this->assertTrue(months(1.5)->add(months(0.5))->equals(months(2)));
        $this->assertTrue(months(1.5)->add(months(3))->equals(months(4.5)));
        $this->assertTrue(months(6)->add(months(6))->equals(years(1)));
    }

    public function testSub(): void
    {
        $this->assertTrue(months(7)->subtract(years(0.5))->equals(months(1)));
        $this->assertTrue(months(6.5)->subtract(years(0.5))->equals(months(0.5)));
        $this->assertTrue(months(1.5)->subtract(months(0.5))->equals(months(1)));
        $this->assertTrue(months(4.5)->subtract(months(3))->equals(months(1.5)));
        $this->assertTrue(months(6)->subtract(months(6))->equals(years(0)));
    }
}