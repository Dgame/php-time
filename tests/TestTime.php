<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\days;
use function Dgame\Time\hours;
use function Dgame\Time\minutes;
use function Dgame\Time\month;
use function Dgame\Time\msecs;
use function Dgame\Time\seconds;
use function Dgame\Time\weeks;
use function Dgame\Time\year;

require_once '../vendor/autoload.php';

class TestTime extends TestCase
{
    public function testMsecs()
    {
        $this->assertTrue(msecs(5000)->inSeconds()->equals(5));
        $this->assertTrue(msecs(5000)->inMinutes()->equals(0.083333333333333));
        $this->assertTrue(msecs(6000)->inMinutes()->equals(0.1));
    }

    public function testSeconds()
    {
        $this->assertTrue(seconds(300)->inMsecs()->equals(300000));
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
        $this->assertTrue(month('Feb', 2015)->inDays()->equals(28));
        $this->assertTrue(month('Feb', 2015)->inWeeks()->equals(4));

        $this->assertTrue(month('Feb', 2016)->inDays()->equals(29));

        $this->assertTrue(month('Jun', 2016)->inDays()->equals(30));
        $this->assertTrue(month('Jun', 2016)->inWeeks()->equals(4.28571));
    }

    public function testYear()
    {
        $this->assertFalse(year(2015)->isLeapyear());
        $this->assertTrue(year(2016)->isLeapyear());
        $this->assertTrue(year(2016)->inDays()->equals(366));
        $this->assertTrue(year(2016)->inWeeks()->equals(52.285714285714));
    }
}