<?php

use function Dgame\Time\Unit\weeks;
use PHPUnit\Framework\TestCase;

class WeeksTest extends TestCase
{
    public function testWeeks()
    {
        $this->assertTrue(weeks(12)->inDays()->equalsAmount(84));
    }
}