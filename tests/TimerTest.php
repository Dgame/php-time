<?php

declare(strict_types=1);

namespace Dgame\Time\Tests;

use Dgame\Time\Timer;
use PHPUnit\Framework\TestCase;

final class TimerTest extends TestCase
{
    /**
     * @group timer
     */
    public function testTimer(): void
    {
        $timer = new Timer();
        $timer->start();
        usleep(545000); // 0.5 - 0.6 seconds
        $ms = $timer->peek();
        $this->assertGreaterThan(500, $ms->getAmount());
        usleep(490000); // ~0.5 seconds
        $ms = $timer->peek();
        $this->assertEquals('1 second', Timer::convert($ms, 0));
        sleep(2);
        $ms = $timer->peek();
        $this->assertEquals('3 seconds', Timer::convert($ms, 0));
        usleep(480000); // 0.5 sec
        $ms = $timer->stop();
        $this->assertEquals('3.5 seconds', Timer::convert($ms, 1));
    }

    /**
     * @group timer
     */
    public function testMultipleTimer(): void
    {
        $timer = new Timer();
        $timer->start();
        usleep(525000);
        $timer->start();
        $t1 = $timer->stop();
        $t2 = $timer->stop();

        $this->assertGreaterThan(500, $t2->subtract($t1)->getAmount());
    }
}
