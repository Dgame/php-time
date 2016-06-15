<?php

namespace Dgame\Time\Unit;

/**
 * Class Days
 * @package Dgame\Time\Unit
 */
final class Days extends TimeUnit
{
    const SECONDS = 86400;
    const MINUTES = 1440;
    const HOURS   = 24;
    const WEEK    = 7;
    const MONTH   = 30.44;
    const YEAR    = 365;

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
        return $this;
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
}