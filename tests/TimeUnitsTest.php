<?php

use Dgame\Time\TimeUnits;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;

class TimeUnitsTest extends TestCase
{
    public function testDateUnit()
    {
        $date = new TimeUnits(days(1000));

        $this->assertTrue($date->getYears()->equalsAmount(2));
        $this->assertTrue($date->getMonths()->equalsAmount(8));
        $this->assertTrue($date->getWeeks()->equalsAmount(3));
        $this->assertTrue($date->getDays()->equalsAmount(5));
        $this->assertTrue($date->getHours()->equalsAmount(11));
        $this->assertTrue($date->getMinutes()->equalsAmount(17));
        $this->assertTrue($date->getSeconds()->equalsAmount(31.2));
    }

    public function testDateUnitDiff()
    {
        $date = TimeUnits::diff(new DateTime('01.08.1985'), new DateTime('04.02.2017'));

        $this->assertTrue($date->getYears()->equalsAmount(31));
        $this->assertTrue($date->getMonths()->equalsAmount(6));
        $this->assertTrue($date->getWeeks()->equalsAmount(1));
        $this->assertTrue($date->getDays()->equalsAmount(5));
        $this->assertTrue($date->getHours()->equalsAmount(8));
        $this->assertTrue($date->getMinutes()->equalsAmount(14));
        $this->assertTrue($date->getSeconds()->equalsAmount(3.84));
    }
}