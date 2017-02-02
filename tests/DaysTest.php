<?php

use function Dgame\Time\Unit\days;
use PHPUnit\Framework\TestCase;

class DaysTest extends TestCase
{
    public function testDays()
    {
        $this->assertTrue(days(7)->inHours()->equalsAmount(168));
        $this->assertTrue(days(7)->inWeeks()->equalsAmount(1));
    }
}