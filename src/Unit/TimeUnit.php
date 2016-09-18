<?php

namespace Dgame\Time\Unit;

/**
 * Class TimeUnit
 * @package Dgame\Time\Unit
 */
abstract class TimeUnit implements TimeConvert
{
    const EPSILON = 0.00001;

    /**
     * @var float
     */
    private $time = 0.0;

    /**
     * TimeUnit constructor.
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
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    abstract public function add(TimeUnit $unit): TimeUnit;

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    abstract public function subtract(TimeUnit $unit): TimeUnit;

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    abstract public function equals(TimeUnit $unit): bool;

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
