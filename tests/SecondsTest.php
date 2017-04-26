<?php

use PHPUnit\Framework\TestCase;
use function Dgame\Time\Unit\seconds;

class SecondsTest extends TestCase
{
    public function testSeconds()
    {
        $this->assertTrue(seconds(300)->inMinutes()->equalsAmount(5));
    }
}