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
    final public function getAmount() : float
    {
        return $this->time;
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    abstract public function add(TimeUnit $unit) : TimeUnit;

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    abstract public function subtract(TimeUnit $unit) : TimeUnit;

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    abstract public function equals(TimeUnit $unit) : bool;

    /**
     * @param float $time
     *
     * @return bool
     */
    final public function equalsAmount(float $time) : bool
    {
        return abs($this->time - $time) < self::EPSILON;
    }

    /**
     * @return string
     */
    final public function __toString() : string
    {
        return (string) $this->time;
    }
}

/**
 * @param float $time
 *
 * @return Seconds
 */
function seconds(float $time) : Seconds
{
    return new Seconds($time);
}

/**
 * @param float $time
 *
 * @return Minutes
 */
function minutes(float $time) : Minutes
{
    return new Minutes($time);
}

/**
 * @param float $time
 *
 * @return Hours
 */
function hours(float $time) : Hours
{
    return new Hours($time);
}

/**
 * @param float $time
 *
 * @return Days
 */
function days(float $time) : Days
{
    return new Days($time);
}

/**
 * @param float $time
 *
 * @return Weeks
 */
function weeks(float $time) : Weeks
{
    return new Weeks($time);
}

/**
 * @param float $time
 *
 * @return Months
 */
function months(float $time) : Months
{
    return new Months($time);
}

/**
 * @param float $time
 *
 * @return Years
 */
function years(float $time) : Years
{
    return new Years($time);
}