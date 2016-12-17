<?php

namespace Dgame\Time\Unit;

/**
 * Class Years
 * @package Dgame\Time\Unit
 */
final class Years extends TimeUnit
{
    const SECONDS_PER_YEAR = 31536000;
    const MINUTES_PER_YEAR = 525600;
    const HOURS_PER_YEAR   = 8760;
    const DAYS_PER_YEAR    = 365;
    const WEEKS_PER_YEAR   = 52;
    const MONTHS_PER_YEAR  = 12;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * self::SECONDS_PER_YEAR);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * self::MINUTES_PER_YEAR);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * self::HOURS_PER_YEAR);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() * self::DAYS_PER_YEAR);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() * self::WEEKS_PER_YEAR);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() * self::MONTHS_PER_YEAR);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return $this;
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inYears()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inYears()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inYears()->getAmount());
    }
}