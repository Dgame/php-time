<?php

namespace Dgame\Time\Unit;

/**
 * Class Milliseconds
 * @package Dgame\Time\Unit
 */
final class Milliseconds extends AbstractTimeUnit
{
    const MSECS_PER_SECOND = 1000;
    const MSECS_PER_MINUTE = Seconds::SECONDS_PER_MINUTE * self::MSECS_PER_SECOND;
    const MSECS_PER_HOUR   = Seconds::SECONDS_PER_HOUR * self::MSECS_PER_SECOND;

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() / self::MSECS_PER_SECOND);
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() / self::MSECS_PER_MINUTE);
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return new Hours($this->getAmount() / self::MSECS_PER_HOUR);
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return $this->inHours()->inDays();
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return $this->inDays()->inWeeks();
    }

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return $this->inWeeks()->inMonths();
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return $this->inMonths()->inYears();
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return bool
     */
    public function equals(TimeUnitInterface $unit): bool
    {
        return $this->equalsAmount(self::inMsecs($unit));
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function add(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() + self::inMsecs($unit));
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function subtract(TimeUnitInterface $unit): TimeUnitInterface
    {
        return new self($this->getAmount() - self::inMsecs($unit));
    }

    /**
     * @param TimeUnitInterface $unit
     *
     * @return float
     */
    private static function inMsecs(TimeUnitInterface $unit): float
    {
        return $unit->inSeconds()->getAmount() * self::MSECS_PER_SECOND;
    }
}