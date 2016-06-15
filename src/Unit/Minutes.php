<?php

namespace Dgame\Time\Unit;

/**
 * Class Minutes
 * @package Dgame\Time\Unit
 */
final class Minutes extends TimeUnit
{
    const SECONDS = 60;
    const HOUR    = 60;
    const DAY     = 1440;
    const WEEK    = 10080;
    const MONTH   = 43833.33;
    const YEAR    = 525600;

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
        return $this;
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
}
