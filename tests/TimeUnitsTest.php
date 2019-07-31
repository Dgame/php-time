<?php

use Dgame\Time\TimeUnits;
use function Dgame\Time\Unit\days;
use function Dgame\Time\Unit\hours;
use function Dgame\Time\Unit\minutes;
use PHPUnit\Framework\TestCase;

class TimeUnitsTest extends TestCase
{
    public function testDateUnit(): void
    {
        $unit = new TimeUnits(days(1000));
        $this->assertTrue($unit->getYears()->equalsAmount(2));
        $this->assertTrue($unit->getMonths()->equalsAmount(8));
        $this->assertTrue($unit->getWeeks()->equalsAmount(3));
        $this->assertTrue($unit->getDays()->equalsAmount(5));
        $this->assertTrue($unit->getHours()->equalsAmount(9));
        $this->assertTrue($unit->getMinutes()->equalsAmount(36));
        $this->assertTrue($unit->getSeconds()->equalsAmount(0));
    }

    public function testDays(): void
    {
        $unit = new TimeUnits(days(2.3));

        $this->assertTrue($unit->getYears()->equalsAmount(0));
        $this->assertTrue($unit->getMonths()->equalsAmount(0));
        $this->assertTrue($unit->getWeeks()->equalsAmount(0));
        $this->assertTrue($unit->getDays()->equalsAmount(2));
        $this->assertTrue($unit->getHours()->equalsAmount(7));
        $this->assertTrue($unit->getMinutes()->equalsAmount(12));
        $this->assertTrue($unit->getSeconds()->equalsAmount(0));
    }

    public function testHours(): void
    {
        $unit = new TimeUnits(hours(4.5));

        $this->assertTrue($unit->getYears()->equalsAmount(0));
        $this->assertTrue($unit->getMonths()->equalsAmount(0));
        $this->assertTrue($unit->getWeeks()->equalsAmount(0));
        $this->assertTrue($unit->getDays()->equalsAmount(0));
        $this->assertTrue($unit->getHours()->equalsAmount(4));
        $this->assertTrue($unit->getMinutes()->equalsAmount(30));
        $this->assertTrue($unit->getSeconds()->equalsAmount(0));
    }

    public function testMinutes(): void
    {
        $unit = new TimeUnits(minutes(525));

        $this->assertTrue($unit->getYears()->equalsAmount(0));
        $this->assertTrue($unit->getMonths()->equalsAmount(0));
        $this->assertTrue($unit->getWeeks()->equalsAmount(0));
        $this->assertTrue($unit->getDays()->equalsAmount(0));
        $this->assertTrue($unit->getHours()->equalsAmount(8));
        $this->assertTrue($unit->getMinutes()->equalsAmount(45));
        $this->assertTrue($unit->getSeconds()->equalsAmount(0));
    }

    public function testDateUnitDiff(): void
    {
        $unit = TimeUnits::diff(new DateTime('01.08.1985'), new DateTime('04.02.2017'));

        $this->assertTrue($unit->getYears()->equalsAmount(31));
        $this->assertTrue($unit->getMonths()->equalsAmount(6));
        $this->assertTrue($unit->getWeeks()->equalsAmount(1));
        $this->assertTrue($unit->getDays()->equalsAmount(5));
        $this->assertTrue($unit->getHours()->equalsAmount(7));
        $this->assertTrue($unit->getMinutes()->equalsAmount(12));
        $this->assertTrue($unit->getSeconds()->equalsAmount(0));
    }
}