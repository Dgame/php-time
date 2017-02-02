<?php

use Dgame\Time\Year;
use PHPUnit\Framework\TestCase;

class YearTest extends TestCase
{
    public function testYear()
    {
        $this->assertFalse(Year::Of(2015)->isLeapyear());
        $this->assertTrue(Year::Of(2016)->isLeapyear());

        $this->assertTrue(Year::Of(2015)->inDays()->equalsAmount(365));
        $this->assertTrue(Year::Of(2016)->inDays()->equalsAmount(366));

        $this->assertTrue(Year::Of(2015)->inWeeks()->equalsAmount(52.142857142857));
        $this->assertTrue(Year::Of(2016)->inWeeks()->equalsAmount(52.285714285714));
    }
}