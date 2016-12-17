<?php

namespace Dgame\Time\Unit;

/**
 * Class Weeks
 * @package Dgame\Time\Unit
 */
final class Weeks extends TimeUnit
{
    const SECONDS_PER_WEEK = 604800;
    const MINUTES_PER_WEEK = 10080;
    const HOURS_PER_WEEK   = 168;
    const DAYS_PER_WEEK    = 7;
    const WEEKS_PER_MONTH  = 4.35;
    const WEEKS_PER_YEAR   = 52;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * self::SECONDS_PER_WEEK);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * self::MINUTES_PER_WEEK);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * self::HOURS_PER_WEEK);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() * self::DAYS_PER_WEEK);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return $this;
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::WEEKS_PER_MONTH);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::WEEKS_PER_YEAR);
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inWeeks()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inWeeks()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inWeeks()->getAmount());
    }
}