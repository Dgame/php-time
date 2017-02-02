<?php

use Dgame\Time\Month;
use PHPUnit\Framework\TestCase;

class MonthTest extends TestCase
{
    public function testMonth()
    {
        $this->assertTrue(Month::Of('Feb', 2015)->inDays()->equalsAmount(28));
        $this->assertTrue(Month::Of('Feb', 2015)->inWeeks()->equalsAmount(4));
        $this->assertTrue(Month::Of('Feb', 2016)->inDays()->equalsAmount(29));
        $this->assertTrue(Month::Of('Jun', 2016)->inDays()->equalsAmount(30));
        $this->assertTrue(Month::Of('Jun', 2016)->inWeeks()->equalsAmount(4.28571));
    }
}