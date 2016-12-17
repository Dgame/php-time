<?php

namespace Dgame\Time\Unit;

/**
 * Class Minutes
 * @package Dgame\Time\Unit
 */
final class Minutes extends TimeUnit
{
    const SECONDS_PER_MINUTE = 60;
    const MINUTES_PER_HOUR   = 60;
    const MINUTES_PER_DAY    = 1440;
    const MINUTES_PER_WEEK   = 10080;
    const MINUTES_PER_MONTH  = 43833.33;
    const MINUTES_PER_YEAR   = 525600;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * self::SECONDS_PER_MINUTE);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return $this;
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() / self::MINUTES_PER_HOUR);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() / self::MINUTES_PER_DAY);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::MINUTES_PER_WEEK);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::MINUTES_PER_MONTH);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::MINUTES_PER_YEAR);
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inMinutes()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inMinutes()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inMinutes()->getAmount());
    }
}
