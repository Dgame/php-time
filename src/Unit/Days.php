<?php

namespace Dgame\Time\Unit;

/**
 * Class Days
 * @package Dgame\Time\Unit
 */
final class Days extends AbstractTimeUnit
{
    const DAYS_PER_WEEK  = 7;
    const DAYS_PER_MONTH = 30.44;
    const DAYS_PER_YEAR  = 365;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_DAY);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_DAY);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_DAY);
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
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function add(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() + $unit->inDays()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function subtract(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() - $unit->inDays()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return bool
     */
    public function equals(TimeUnitInterface $unit): bool
    {
        return $this->equalsAmount($unit->inDays()->getAmount());
    }
}