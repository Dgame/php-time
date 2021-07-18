<?php

declare(strict_types=1);

namespace Dgame\Time\Tests;

namespace Dgame\Time\Tests;

use Dgame\Time\Year;
use PHPUnit\Framework\TestCase;

final class YearTest extends TestCase
{
    public function testCurrent(): void
    {
        $year = Year::current();
        $this->assertEquals(date('Y'), $year->getYear());
        $this->assertEquals((int) date('L'), $year->isLeapyear());

        $days = (int) date('L') === 1 ? 366 : 365;
        $this->assertTrue($year->inDays()->equalsAmount($days));
    }

    public function testOf(): void
    {
        $this->assertFalse(Year::of(2015)->isLeapyear());
        $this->assertTrue(Year::of(2016)->isLeapyear());

        $this->assertTrue(Year::of(2015)->inDays()->equalsAmount(365));
        $this->assertTrue(Year::of(2016)->inDays()->equalsAmount(366));

        $this->assertTrue(Year::of(2015)->inWeeks()->equalsAmount(52.142857142857146));
        $this->assertTrue(Year::of(2016)->inWeeks()->equalsAmount(52.285714285714285));

        $this->assertTrue(Year::of(2015)->inHours()->equalsAmount(365 * 24));
        $this->assertTrue(Year::of(2015)->inMinutes()->equalsAmount(365 * 24 * 60));
        $this->assertTrue(Year::of(2015)->inSeconds()->equalsAmount(365 * 24 * 60 * 60));
    }
}
