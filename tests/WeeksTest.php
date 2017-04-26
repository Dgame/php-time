<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\weeks;

class WeeksTest extends TestCase
{
    public function testWeeks()
    {
        $this->assertTrue(weeks(12)->inDays()->equalsAmount(84));
    }
}