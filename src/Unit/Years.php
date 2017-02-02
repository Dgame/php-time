<?php

namespace Dgame\Time\Unit;

/**
 * Class Years
 * @package Dgame\Time\Unit
 */
final class Years extends AbstractTimeUnit
{
    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_YEAR);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_YEAR);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_YEAR);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() * Days::DAYS_PER_YEAR);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() * Weeks::WEEKS_PER_YEAR);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() * Months::MONTHS_PER_YEAR);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return $this;
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function add(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() + $unit->inYears()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function subtract(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() - $unit->inYears()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return bool
     */
    public function equals(TimeUnitInterface $unit): bool
    {
        return $this->equalsAmount($unit->inYears()->getAmount());
    }
}