<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\months;

class MonthsTest extends TestCase
{
    public function testMonths()
    {
        $this->assertTrue(months(12)->inWeeks()->equalsAmount(52.2));
        $this->assertTrue(months(12)->inYears()->equalsAmount(1));
    }
}