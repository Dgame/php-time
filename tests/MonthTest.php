<?php

use Dgame\Time\Exception\InvalidMonthException;
use Dgame\Time\Month;
use PHPUnit\Framework\TestCase;

class MonthTest extends TestCase
{
    public function testCurrent(): void
    {
        $month = Month::current();
        $this->assertEquals(date('n'), $month->getMonth());
        $this->assertEquals(date('Y'), $month->getYear());
    }

    public function testOf(): void
    {
        $this->assertTrue(Month::of('Feb', 2015)->inDays()->equalsAmount(28));
        $this->assertTrue(Month::of('Feb', 2015)->inWeeks()->equalsAmount(4));
        $this->assertTrue(Month::of('Feb', 2016)->inDays()->equalsAmount(29));
        $this->assertTrue(Month::of('Feb', 2016)->inHours()->equalsAmount(696));
        $this->assertTrue(Month::of('Feb', 2016)->inMinutes()->equalsAmount(41760));
        $this->assertTrue(Month::of('Feb', 2016)->inSeconds()->equalsAmount(2505600));
        $this->assertTrue(Month::of('Jun', 2016)->inDays()->equalsAmount(30));
        $this->assertTrue(Month::of('Jun', 2016)->inWeeks()->equalsAmount(4.28571));

        $this->expectException(InvalidMonthException::class);

        Month::of('Foo');
    }
}