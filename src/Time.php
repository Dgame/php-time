<?php

namespace Dgame\Time;

/**
 * Class Time
 * @package Dgame\Time
 */
abstract class Time implements TimeConvert
{
    const EPSILON = 0.00001;

    /**
     * @var float
     */
    private $value = 0.0;

    /**
     * @return Time
     */
    public static function Current() : Time
    {
        return self::Of(time());
    }

    /**
     * @param float $time
     *
     * @return Time
     */
    public static function Of(float $time) : Time
    {
        return new static($time);
    }

    /**
     * Time constructor.
     *
     * @param float $value
     */
    private function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    final public function asFloat() : float
    {
        return $this->value;
    }

    /**
     * @return int
     */
    final public function asInt() : int
    {
        return $this->value;
    }

    /**
     * @param float $time
     *
     * @return bool
     */
    final public function equals(float $time) : bool
    {
        return abs($this->value - $time) < self::EPSILON;
    }

    /**
     * @return string
     */
    final public function __toString() : string
    {
        return (string) $this->value;
    }
}

/**
 * @param float $time
 *
 * @return Msecs
 */
function msecs(float $time) : Msecs
{
    return Msecs::Of($time);
}

/**
 * @param float $time
 *
 * @return Seconds
 */
function seconds(float $time) : Seconds
{
    return Seconds::Of($time);
}

/**
 * @param float $time
 *
 * @return Minutes
 */
function minutes(float $time) : Minutes
{
    return Minutes::Of($time);
}

/**
 * @param float $time
 *
 * @return Hours
 */
function hours(float $time) : Hours
{
    return Hours::Of($time);
}

/**
 * @param float $time
 *
 * @return Days
 */
function days(float $time) : Days
{
    return Days::Of($time);
}

/**
 * @param float $time
 *
 * @return Weeks
 */
function weeks(float $time) : Weeks
{
    return Weeks::Of($time);
}

/**
 * @param          $month
 * @param int|null $year
 *
 * @return Month
 * @throws Exception\InvalidMonthException
 */
function month($month, int $year = null) : Month
{
    return Month::Of($month, $year);
}

/**
 * @param int $year
 *
 * @return Year
 */
function year(int $year) : Year
{
    return Year::Of($year);
}