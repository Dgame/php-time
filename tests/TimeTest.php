<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;
use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\minutes;
use function Dgame\Time\Unit\weeks;
use function Dgame\Time\Unit\years;

class TimeTest extends TestCase
{
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
    }
}