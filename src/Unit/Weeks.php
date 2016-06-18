<?php

namespace Dgame\Time\Unit;

/**
 * Class Weeks
 * @package Dgame\Time\Unit
 */
final class Weeks extends TimeUnit
{
    const SECONDS = 604800;
    const MINUTES = 10080;
    const HOURS   = 168;
    const DAYS    = 7;
    const MONTH   = 4.35;
    const YEAR    = 52;

    /**
     * @return Seconds
     */
    public function inSeconds() : Seconds
    {
        return new Seconds($this->getAmount() * self::SECONDS);
    }

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes
    {
        return new Minutes($this->getAmount() * self::MINUTES);
    }

    /**
     * @return Hours
     */
    public function inHours() : Hours
    {
        return new Hours($this->getAmount() * self::HOURS);
    }

    /**
     * @return Days
     */
    public function inDays() : Days
    {
        return new Days($this->getAmount() * self::DAYS);
    }

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks
    {
        return $this;
    }

    /**
     * @return Months
     */
    public function inMonths() : Months
    {
        return new Months($this->getAmount() / self::MONTH);
    }

    /**
     * @return Years
     */
    public function inYears() : Years
    {
        return new Years($this->getAmount() / self::YEAR);
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit) : TimeUnit
    {
        return new self($this->getAmount() + $unit->inWeeks()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit) : TimeUnit
    {
        return new self($this->getAmount() - $unit->inWeeks()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit) : bool
    {
        return $this->equalsAmount($unit->inWeeks()->getAmount());
    }
}