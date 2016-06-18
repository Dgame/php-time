<?php

namespace Dgame\Time\Unit;

/**
 * Class Seconds
 * @package Dgame\Time\Unit
 */
final class Seconds extends TimeUnit
{
    const MINUTE = 60;
    const HOUR   = 3600;
    const DAY    = 86400;
    const WEEK   = 604800;
    const MONTH  = 2630000;
    const YEAR   = 31536000;

    /**
     * @return Seconds
     */
    public function inSeconds() : Seconds
    {
        return $this;
    }

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes
    {
        return new Minutes($this->getAmount() / self::MINUTE);
    }

    /**
     * @return Hours
     */
    public function inHours() : Hours
    {
        return new Hours($this->getAmount() / self::HOUR);
    }

    /**
     * @return Days
     */
    public function inDays() : Days
    {
        return new Days($this->getAmount() / self::DAY);
    }

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks
    {
        return new Weeks($this->getAmount() / self::WEEK);
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
        return new self($this->getAmount() + $unit->inSeconds()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return TimeUnit
     */
    public function subtract(TimeUnit $unit) : TimeUnit
    {
        return new self($this->getAmount() - $unit->inSeconds()->getAmount());
    }

    /**
     * @param TimeUnit $unit
     *
     * @return bool
     */
    public function equals(TimeUnit $unit) : bool
    {
        return $this->equalsAmount($unit->inSeconds()->getAmount());
    }
}