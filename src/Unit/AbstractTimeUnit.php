<?php

namespace Dgame\Time\Unit;

use Dgame\Time\Timer;

/**
 * Class AbstractTimeUnit
 * @package Dgame\Time\Unit
 */
abstract class AbstractTimeUnit implements TimeUnitInterface
{
    /**
     * @var float
     */
    private $time = 0.0;

    /**
     * AbstractTimeUnit constructor.
     *
     * @param float $time
     */
    final public function __construct(float $time)
    {
        $this->time = $time;
    }

    /**
     * @return float
     */
    final public function getAmount(): float
    {
        return $this->time;
    }

    /**
     * @param float $time
     *
     * @return bool
     */
    final public function equalsAmount(float $time): bool
    {
        return Timer::equals($this->time, $time);
    }

    /**
     * @return string
     */
    final public function __toString(): string
    {
        return (string) $this->time;
    }
}
