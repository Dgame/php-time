<?php

namespace Dgame\Time\Unit;

/**
 * Class Months
 * @package Dgame\Time\Unit
 */
final class Months extends TimeUnit
{
    const SECONDS_PER_MONTH = 2630000;
    const MINUTES_PER_MONTH = 43833.33;
    const HOURS_PER_MONTH   = 730.56;
    const DAYS_PER_MONTH    = 30.44;
    const WEEKS_PER_MONTH   = 4.35;
    const MONTHS_PER_YEAR   = 12;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * self::SECONDS_PER_MONTH);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * self::MINUTES_PER_MONTH);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * self::HOURS_PER_MONTH);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() * self::DAYS_PER_MONTH);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() * self::WEEKS_PER_MONTH);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return $this;
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::MONTHS_PER_YEAR);
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inMonths()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inMonths()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inMonths()->getAmount());
    }
}