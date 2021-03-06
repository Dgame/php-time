<?php

namespace Dgame\Time\Unit;

/**
 * Class Seconds
 * @package Dgame\Time\Unit
 */
final class Seconds extends AbstractTimeUnit
{
    const SECONDS_PER_MINUTE = 60;
    const SECONDS_PER_HOUR   = 3600;
    const SECONDS_PER_DAY    = 86400;
    const SECONDS_PER_WEEK   = 604800;
    const SECONDS_PER_MONTH  = 2630880;
    const SECONDS_PER_YEAR   = 31536000;

    /**
     * @return Seconds
     */
    public function inSeconds(): self
    {
        return $this;
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() / self::SECONDS_PER_MINUTE);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() / self::SECONDS_PER_HOUR);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days($this->getAmount() / self::SECONDS_PER_DAY);
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::SECONDS_PER_WEEK);
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::SECONDS_PER_MONTH);
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::SECONDS_PER_YEAR);
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function add(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() + $unit->inSeconds()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function subtract(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() - $unit->inSeconds()->getAmount());
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return bool
     */
    public function equals(TimeUnitInterface $unit): bool
    {
        return $this->equalsAmount($unit->inSeconds()->getAmount());
    }
}