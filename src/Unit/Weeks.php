<?php

namespace Dgame\Time\Unit;

/**
 * Class Weeks
 * @package Dgame\Time\Unit
 */
final class Weeks extends AbstractTimeUnit
{
    const WEEKS_PER_MONTH = 4.35;
    const WEEKS_PER_YEAR  = 52.2;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_WEEK);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_WEEK);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_WEEK);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() * Days::DAYS_PER_WEEK);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): self
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
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function add(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() + $unit->inWeeks()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function subtract(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() - $unit->inWeeks()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return bool
     */
    public function equals(TimeUnitInterface $unit): bool
    {
        return $this->equalsAmount($unit->inWeeks()->getAmount());
    }
}