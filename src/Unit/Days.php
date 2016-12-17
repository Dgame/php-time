<?php

namespace Dgame\Time\Unit;

/**
 * Class Days
 * @package Dgame\Time\Unit
 */
final class Days extends TimeUnit
{
    const SECONDS_PER_DAY = 86400;
    const MINUTES_PER_DAY = 1440;
    const HOURS_PER_DAY   = 24;
    const DAYS_PER_WEEK   = 7;
    const DAYS_PER_MONTH  = 30.44;
    const DAYS_PER_YEAR   = 365;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * self::SECONDS_PER_DAY);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * self::MINUTES_PER_DAY);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * self::HOURS_PER_DAY);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return $this;
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::DAYS_PER_WEEK);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::DAYS_PER_MONTH);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::DAYS_PER_YEAR);
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inDays()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inDays()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inDays()->getAmount());
    }
}