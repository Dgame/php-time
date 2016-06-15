<?php

namespace Dgame\Time;

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\TimeUnit;
use Dgame\Time\Unit\Weeks;
use Dgame\Time\Unit\Years;

final class Date
{
    private $years   = null;
    private $months  = null;
    private $weeks   = null;
    private $days    = null;
    private $hours   = null;
    private $minutes = null;
    private $seconds = null;

    public static function Of(TimeUnit $unit) : Date
    {
        return new self($unit);
    }

    private static function Separate(float $total) : array
    {
        $number = floor($total);

        return [$number, $total - $number];
    }

    private function __construct(TimeUnit $unit)
    {
    }

    /**
     * @return Years
     */
    public function getYears() : Years
    {
        return $this->years;
    }

    /**
     * @return Months
     */
    public function getMonths() : Months
    {
        return $this->months;
    }

    /**
     * @return Weeks
     */
    public function getWeeks() : Weeks
    {
        return $this->weeks;
    }

    /**
     * @return Days
     */
    public function getDays() : Days
    {
        return $this->days;
    }

    /**
     * @return Hours
     */
    public function getHours() : Hours
    {
        return $this->hours;
    }

    /**
     * @return Minutes
     */
    public function getMinutes() : Minutes
    {
        return $this->minutes;
    }

    /**
     * @return Seconds
     */
    public function getSeconds() : Seconds
    {
        return $this->seconds;
    }
}