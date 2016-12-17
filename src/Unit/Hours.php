<?php

namespace Dgame\Time\Unit;

/**
 * Class Hours
 * @package Dgame\Time\Unit
 */
final class Hours extends TimeUnit
{
    const HOURS_PER_DAY    = 24;
    const HOURS_PER_WEEK   = 168;
    const HOURS_PER_MONTH  = 730.56;
    const HOURS_PER_YEAR   = 8760;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_HOUR);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_HOUR);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return $this;
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() / self::HOURS_PER_DAY);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::HOURS_PER_WEEK);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::HOURS_PER_MONTH);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::HOURS_PER_YEAR);
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inHours()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inHours()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inHours()->getAmount());
    }
}