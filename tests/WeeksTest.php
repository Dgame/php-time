<?php

declare(strict_types=1);

namespace Dgame\Time\Tests;

use function Dgame\Time\Unit\days;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use function Dgame\Time\Unit\weeks;
use PHPUnit\Framework\TestCase;

final class WeeksTest extends TestCase
{
    public function testWeeks(): void
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

    public function testAdd(): void
    {
        $this->assertTrue(weeks(1)->add(weeks(2))->equals(days(21)));
    }

    public function testSub(): void
    {
        $this->assertTrue(weeks(4)->subtract(weeks(2))->equals(days(14)));
    }
}
