<?php

use Dgame\Time\Month;
use Dgame\Time\Year;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;
use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\minutes;
use function Dgame\Time\Unit\seconds;
use function Dgame\Time\Unit\weeks;

require_once '../vendor/autoload.php';

class TestTime extends TestCase
{
    public function testSeconds()
    {
        $this->assertTrue(seconds(300)->inMinutes()->equals(5));
    }

    public function testMinutes()
    {
        $this->assertTrue(minutes(50)->inSeconds()->equals(3000));
        $this->assertTrue(minutes(50)->inHours()->equals(0.83333333333333));

        $this->assertTrue(minutes(60)->inSeconds()->equals(3600));
        $this->assertTrue(minutes(60)->inHours()->equals(1));
    }

    public function testHours()
    {
        $this->assertTrue(hours(26)->inMinutes()->equals(1560));
        $this->assertTrue(hours(26)->inDays()->equals(1.08333));

        $this->assertTrue(hours(24)->inMinutes()->equals(1440));
        $this->assertTrue(hours(24)->inDays()->equals(1));
    }

    public function testDays()
    {
        $this->assertTrue(days(7)->inHours()->equals(168));
        $this->assertTrue(days(7)->inWeeks()->equals(1));
    }

    public function testWeeks()
    {
        $this->assertTrue(weeks(12)->inDays()->equals(84));
    }

    public function testMonth()
    {
        $this->assertTrue(Month::Of('Feb', 2015)->inDays()->equals(28));
        $this->assertTrue(Month::Of('Feb', 2015)->inWeeks()->equals(4));
        $this->assertTrue(Month::Of('Feb', 2016)->inDays()->equals(29));
        $this->assertTrue(Month::Of('Jun', 2016)->inDays()->equals(30));
        $this->assertTrue(Month::Of('Jun', 2016)->inWeeks()->equals(4.28571));
    }

    public function testYear()
    {
        $this->assertFalse(Year::Of(2015)->isLeapyear());
        $this->assertTrue(Year::Of(2016)->isLeapyear());

        $this->assertTrue(Year::Of(2015)->inDays()->equals(365));
        $this->assertTrue(Year::Of(2016)->inDays()->equals(366));

        $this->assertTrue(Year::Of(2015)->inWeeks()->equals(52.142857142857));
        $this->assertTrue(Year::Of(2016)->inWeeks()->equals(52.285714285714));
    }

    public function testClock()
    {
        $date = '15:21:31';
        //        $clock = Clock::FromString($date);

        //        $this->assertTrue($clock->getHours()->equals(15));
        //        $this->assertTrue($clock->getMinutes()->equals(21));
        //        $this->assertTrue($clock->getSeconds()->equals(31));
        //
        //        $this->assertEquals($clock, $date);
        //
        //        $clock->addHours(hours(1.5));

        //        print_r($clock);
    }
}