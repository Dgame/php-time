<?php

declare(strict_types=1);

namespace Dgame\Time\Tests;

use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\minutes;
use Dgame\Time\Unit\Seconds;
use function Dgame\Time\Unit\seconds;
use PHPUnit\Framework\TestCase;

final class SecondsTest extends TestCase
{
    public function testSeconds(): void
    {
        foreach (range(1, 600) as $second) {
            $this->assertTrue(seconds($second)->inSeconds()->equalsAmount($second));
            $this->assertTrue(seconds($second)->inMinutes()->equalsAmount($second / Seconds::SECONDS_PER_MINUTE));
            $this->assertTrue(seconds($second)->inHours()->equalsAmount($second / Seconds::SECONDS_PER_HOUR));
            $this->assertTrue(seconds($second)->inDays()->equalsAmount($second / Seconds::SECONDS_PER_DAY));
            $this->assertTrue(seconds($second)->inWeeks()->equalsAmount($second / Seconds::SECONDS_PER_WEEK));
            $this->assertTrue(seconds($second)->inMonths()->equalsAmount($second / Seconds::SECONDS_PER_MONTH));
            $this->assertTrue(seconds($second)->inYears()->equalsAmount($second / Seconds::SECONDS_PER_YEAR));
        }
    }

    public function testAdd(): void
    {
        $this->assertTrue(seconds(60)->add(seconds(60))->equals(minutes(2)));
        $this->assertTrue(seconds(90)->add(seconds(60))->equals(minutes(2.5)));
        $this->assertTrue(seconds(90)->add(seconds(30))->equals(minutes(2)));
        $this->assertTrue(seconds(59)->add(seconds(1))->equals(minutes(1)));
        $this->assertTrue(seconds(59.5)->add(seconds(0.5))->equals(minutes(1)));
        $this->assertTrue(seconds(3500)->add(seconds(100))->equals(hours(1)));
    }

    public function testSub(): void
    {
        $this->assertTrue(seconds(60)->subtract(seconds(60))->equals(minutes(0)));
        $this->assertTrue(seconds(90)->subtract(seconds(60))->equals(minutes(0.5)));
        $this->assertTrue(seconds(90)->subtract(seconds(30))->equals(minutes(1)));
        $this->assertTrue(seconds(59)->subtract(seconds(1))->equals(seconds(58)));
        $this->assertTrue(seconds(59.5)->subtract(seconds(0.5))->equals(seconds(59)));
        $this->assertTrue(seconds(3700)->subtract(seconds(100))->equals(hours(1)));
    }
}
