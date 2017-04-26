<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\days;

class DaysTest extends TestCase
{
    public function testDays()
    {
        $this->assertTrue(days(7)->inHours()->equalsAmount(168));
        $this->assertTrue(days(7)->inWeeks()->equalsAmount(1));
    }
}