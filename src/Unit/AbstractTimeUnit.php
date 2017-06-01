<?php

namespace Dgame\Time\Unit;

/**
 * Class AbstractTimeUnit
 * @package Dgame\Time\Unit
 */
abstract class AbstractTimeUnit implements TimeUnitInterface
{
    const EPSILON = 0.00001;

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
        return abs($this->time - $time) < self::EPSILON;
    }

    /**
     * @return string
     */
    final public function __toString(): string
    {
        return (string) $this->time;
    }
}
