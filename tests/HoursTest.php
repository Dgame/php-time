<?php

use function Dgame\Time\Unit\hours;
use PHPUnit\Framework\TestCase;

class HoursTest extends TestCase
{
    public function testHours()
    {
        $this->assertTrue(hours(26)->inMinutes()->equalsAmount(1560));
        $this->assertTrue(hours(26)->inDays()->equalsAmount(1.08333));

        $this->assertTrue(hours(24)->inMinutes()->equalsAmount(1440));
        $this->assertTrue(hours(24)->inDays()->equalsAmount(1));
    }
}