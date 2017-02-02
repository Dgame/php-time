<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\years;

class YearsTest extends TestCase
{
    public function testYears()
    {
        $this->assertTrue(years(1)->inWeeks()->equalsAmount(52));
        $this->assertTrue(years(2)->inMonths()->equalsAmount(24));
    }
}