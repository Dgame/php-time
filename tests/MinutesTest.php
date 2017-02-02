<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\minutes;

class MinutesTest extends TestCase
{
    public function testMinutes()
    {
        $this->assertTrue(minutes(50)->inSeconds()->equalsAmount(3000));
        $this->assertTrue(minutes(50)->inHours()->equalsAmount(0.83333333333333));

        $this->assertTrue(minutes(60)->inSeconds()->equalsAmount(3600));
        $this->assertTrue(minutes(60)->inHours()->equalsAmount(1));
    }
}