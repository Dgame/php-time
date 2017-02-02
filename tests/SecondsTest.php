<?php

use function Dgame\Time\Unit\seconds;
use PHPUnit\Framework\TestCase;

class SecondsTest extends TestCase
{
    public function testSeconds()
    {
        $this->assertTrue(seconds(300)->inMinutes()->equalsAmount(5));
    }
}