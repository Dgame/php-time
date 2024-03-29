<?php

declare(strict_types=1);

namespace Dgame\Time\Tests;

use function Dgame\Time\Unit\msecs;
use PHPUnit\Framework\TestCase;

final class MillisecondsTest extends TestCase
{
    public function testBasic(): void
    {
        $msecs1 = msecs(500);
        $this->assertEquals(0.5, $msecs1->inSeconds()->getAmount());

        $msecs2 = msecs(3000);
        $this->assertEquals(3, $msecs2->inSeconds()->getAmount());

        $this->assertEquals(2.5, $msecs2->subtract($msecs1)->inSeconds()->getAmount());
        $this->assertEquals(3.5, $msecs1->add($msecs2)->inSeconds()->getAmount());
    }
}
