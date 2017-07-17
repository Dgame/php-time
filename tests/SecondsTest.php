<?php

use Dgame\Time\Unit\Seconds;
use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\seconds;

class SecondsTest extends TestCase
{
    public function testSeconds()
    {
        foreach (range(1, 600) as $second) {
            $this->assertTrue(seconds($second)->inSeconds()->equalsAmount($second));
            $this->assertTrue(seconds($second)->inMinutes()->equalsAmount($second / Seconds::SECONDS_PER_MINUTE));
            $this->assertTrue(seconds($second)->inHours()->equalsAmount($second / Seconds::SECONDS_PER_HOUR));
            $this->assertTrue(seconds($second)->inDays()->equalsAmount($second / Seconds::SECONDS_PER_DAY));
            $this->assertTrue(seconds($second)->inWeeks()->equalsAmount($second / Seconds::SECONDS_PER_WEEK));
            $this->assertTrue(seconds($second)->inMonths()->equalsAmount($second / Seconds::SECONDS_PER_MONTH));
            $this->assertTrue(seconds($second)->inYears()->equalsAmount($second / Seconds::SECONDS_PER_YEAR));
        }
    }
}