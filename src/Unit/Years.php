<?php

namespace Dgame\Time\Unit;

/**
 * Class Years
 * @package Dgame\Time\Unit
 */
final class Years extends TimeUnit
{
    const SECONDS = 31536000;
    const MINUTES = 525600;
    const HOURS   = 8760;
    const DAYS    = 365;
    const WEEKS   = 52;
    const MONTHS  = 12;

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
        return new Weeks($this->getAmount() * self::WEEKS);
    }

    /**
     * @return Months
     */
    public function inMonths() : Months
    {
        return new Months($this->getAmount() * self::MONTHS);
    }

    /**
     * @return Years
     */
    public function inYears() : Years
    {
        return $this;
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function add(TimeUnit $unit) : TimeUnit
    {
        return new self($this->getAmount() + $unit->inYears()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit) : TimeUnit
    {
        return new self($this->getAmount() - $unit->inYears()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit) : bool
    {
        return $this->equalsAmount($unit->inYears()->getAmount());
    }
}