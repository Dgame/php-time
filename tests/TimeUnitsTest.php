<?php

use Dgame\Time\TimeUnits;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;
use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\minutes;

class TimeUnitsTest extends TestCase
{
    public function testDateUnit()
    {
        $unit = new TimeUnits(days(1000));

        $this->assertTrue($unit->getYears()->equalsAmount(2));
        $this->assertTrue($unit->getMonths()->equalsAmount(8));
        $this->assertTrue($unit->getWeeks()->equalsAmount(3));
        $this->assertTrue($unit->getDays()->equalsAmount(5));
        $this->assertTrue($unit->getHours()->equalsAmount(11));
        $this->assertTrue($unit->getMinutes()->equalsAmount(17));
        $this->assertTrue($unit->getSeconds()->equalsAmount(31.2));
    }

    public function testDays()
    {
        $unit = new TimeUnits(days(2.3));

        $this->assertTrue($unit->getYears()->equalsAmount(0));
        $this->assertTrue($unit->getMonths()->equalsAmount(0));
        $this->assertTrue($unit->getWeeks()->equalsAmount(0));
        $this->assertTrue($unit->getDays()->equalsAmount(2));
        $this->assertTrue($unit->getHours()->equalsAmount(7));
        $this->assertTrue($unit->getMinutes()->equalsAmount(9));
        $this->assertTrue($unit->getSeconds()->equalsAmount(15.84));
    }

    public function testHours()
    {
        $unit = new TimeUnits(hours(4.5));

        $this->assertTrue($unit->getYears()->equalsAmount(0));
        $this->assertTrue($unit->getMonths()->equalsAmount(0));
        $this->assertTrue($unit->getWeeks()->equalsAmount(0));
        $this->assertTrue($unit->getDays()->equalsAmount(0));
        $this->assertTrue($unit->getHours()->equalsAmount(4));
        $this->assertTrue($unit->getMinutes()->equalsAmount(23));
        $this->assertTrue($unit->getSeconds()->equalsAmount(5.28));
    }

    public function testMinutes()
    {
        $unit = new TimeUnits(minutes(525));

        $this->assertTrue($unit->getYears()->equalsAmount(0));
        $this->assertTrue($unit->getMonths()->equalsAmount(0));
        $this->assertTrue($unit->getWeeks()->equalsAmount(0));
        $this->assertTrue($unit->getDays()->equalsAmount(0));
        $this->assertTrue($unit->getHours()->equalsAmount(8));
        $this->assertTrue($unit->getMinutes()->equalsAmount(46));
        $this->assertTrue($unit->getSeconds()->equalsAmount(10.56));
    }

    public function testDateUnitDiff()
    {
        $unit = TimeUnits::diff(new DateTime('01.08.1985'), new DateTime('04.02.2017'));

        $this->assertTrue($unit->getYears()->equalsAmount(31));
        $this->assertTrue($unit->getMonths()->equalsAmount(6));
        $this->assertTrue($unit->getWeeks()->equalsAmount(1));
        $this->assertTrue($unit->getDays()->equalsAmount(5));
        $this->assertTrue($unit->getHours()->equalsAmount(8));
        $this->assertTrue($unit->getMinutes()->equalsAmount(14));
        $this->assertTrue($unit->getSeconds()->equalsAmount(3.84));
    }
}