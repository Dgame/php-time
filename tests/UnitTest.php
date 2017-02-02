<?php

use Dgame\Time\Units;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;

class UnitTest extends TestCase
{
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
}