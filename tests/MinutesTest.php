<?php

declare(strict_types=1);

namespace Dgame\Time\Tests;

use function Dgame\Time\Unit\hours;
use Dgame\Time\Unit\Minutes;
use function Dgame\Time\Unit\minutes;
use Dgame\Time\Unit\Seconds;
use function Dgame\Time\Unit\seconds;
use PHPUnit\Framework\TestCase;

final class MinutesTest extends TestCase
{
    public function testMinutes(): void
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

    public function testAdd(): void
    {
        $this->assertTrue(minutes(1)->add(seconds(60))->equals(minutes(2)));
        $this->assertTrue(minutes(1.5)->add(seconds(60))->equals(minutes(2.5)));
        $this->assertTrue(minutes(1.5)->add(seconds(30))->equals(minutes(2)));
        $this->assertTrue(minutes(59)->add(seconds(30))->equals(minutes(59.5)));
        $this->assertTrue(minutes(59.5)->add(seconds(30))->equals(hours(1)));
    }

    public function testSub(): void
    {
        $this->assertTrue(minutes(1)->subtract(seconds(60))->equals(minutes(0)));
        $this->assertTrue(minutes(1.5)->subtract(seconds(60))->equals(minutes(0.5)));
        $this->assertTrue(minutes(1.5)->subtract(seconds(30))->equals(minutes(1)));
        $this->assertTrue(minutes(59)->subtract(seconds(30))->equals(minutes(58.5)));
        $this->assertTrue(minutes(59.5)->subtract(seconds(30))->equals(minutes(59)));
    }
}
