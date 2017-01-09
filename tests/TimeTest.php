<?php

use Dgame\Time\Month;
use Dgame\Time\Units;
use Dgame\Time\Year;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;
use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\minutes;
use function Dgame\Time\Unit\months;
use function Dgame\Time\Unit\seconds;
use function Dgame\Time\Unit\weeks;
use function Dgame\Time\Unit\years;

class TimeTest extends TestCase
{
    public function testSeconds()
    {
        $this->assertTrue(seconds(300)->inMinutes()->equalsAmount(5));
    }

    public function testMinutes()
    {
        $this->assertTrue(minutes(50)->inSeconds()->equalsAmount(3000));
        $this->assertTrue(minutes(50)->inHours()->equalsAmount(0.83333333333333));

        $this->assertTrue(minutes(60)->inSeconds()->equalsAmount(3600));
        $this->assertTrue(minutes(60)->inHours()->equalsAmount(1));
    }

    public function testHours()
    {
        $this->assertTrue(hours(26)->inMinutes()->equalsAmount(1560));
        $this->assertTrue(hours(26)->inDays()->equalsAmount(1.08333));

        $this->assertTrue(hours(24)->inMinutes()->equalsAmount(1440));
        $this->assertTrue(hours(24)->inDays()->equalsAmount(1));
    }

    public function testDays()
    {
        $this->assertTrue(days(7)->inHours()->equalsAmount(168));
        $this->assertTrue(days(7)->inWeeks()->equalsAmount(1));
    }

    public function testWeeks()
    {
        $this->assertTrue(weeks(12)->inDays()->equalsAmount(84));
    }

    public function testMonths()
    {
        $this->assertTrue(months(12)->inWeeks()->equalsAmount(52.2));
        $this->assertTrue(months(12)->inYears()->equalsAmount(1));
    }

    public function testYears()
    {
        $this->assertTrue(years(1)->inWeeks()->equalsAmount(52));
        $this->assertTrue(years(2)->inMonths()->equalsAmount(24));
    }

    public function testMonth()
    {
        $this->assertTrue(Month::Of('Feb', 2015)->inDays()->equalsAmount(28));
        $this->assertTrue(Month::Of('Feb', 2015)->inWeeks()->equalsAmount(4));
        $this->assertTrue(Month::Of('Feb', 2016)->inDays()->equalsAmount(29));
        $this->assertTrue(Month::Of('Jun', 2016)->inDays()->equalsAmount(30));
        $this->assertTrue(Month::Of('Jun', 2016)->inWeeks()->equalsAmount(4.28571));
    }

    public function testYear()
    {
        $this->assertFalse(Year::Of(2015)->isLeapyear());
        $this->assertTrue(Year::Of(2016)->isLeapyear());

        $this->assertTrue(Year::Of(2015)->inDays()->equalsAmount(365));
        $this->assertTrue(Year::Of(2016)->inDays()->equalsAmount(366));

        $this->assertTrue(Year::Of(2015)->inWeeks()->equalsAmount(52.142857142857));
        $this->assertTrue(Year::Of(2016)->inWeeks()->equalsAmount(52.285714285714));
    }

    public function testDateUnit()
    {
        $date = new Units(days(1000));

        $this->assertTrue($date->getYears()->equalsAmount(2));
        $this->assertTrue($date->getMonths()->equalsAmount(8));
        $this->assertTrue($date->getWeeks()->equalsAmount(3));
        $this->assertTrue($date->getDays()->equalsAmount(5));
        $this->assertTrue($date->getHours()->equalsAmount(11));
        $this->assertTrue($date->getMinutes()->equalsAmount(31));
        $this->assertTrue($date->getSeconds()->equalsAmount(12));
    }

    public function testEquality()
    {
        $this->assertTrue(hours(24)->equals(days(1)));
        $this->assertTrue(days(1)->equals(hours(24)));
        $this->assertTrue(years(1)->equals(days(365)));
        $this->assertTrue(weeks(1)->equals(days(7)));
        $this->assertTrue(hours(1)->equals(minutes(60)));
    }

    public function testAdd()
    {
        $this->assertTrue(days(1)->add(hours(24))->equals(days(2)));
    }

    public function testSubtract()
    {
        $this->assertTrue(hours(24)->subtract(days(0.5))->equals(hours(12)));
        $this->assertEquals(date('d.m.Y H:i:s', strtotime('-3 days')), seconds(time())->subtract(days(3))->format('d.m.Y H:i:s'));
    }
}