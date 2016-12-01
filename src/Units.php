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

/**
 * Class Units
 * @package Dgame\Time
 */
final class Units
{
    /**
     * @var Years
     */
    private $years;
    /**
     * @var Months
     */
    private $months;
    /**
     * @var Weeks
     */
    private $weeks;
    /**
     * @var Days
     */
    private $days;
    /**
     * @var Hours
     */
    private $hours;
    /**
     * @var Minutes
     */
    private $minutes;
    /**
     * @var Seconds
     */
    private $seconds;

    /**
     * Date constructor.
     *
     * @param TimeUnit $unit
     */
    public function __construct(TimeUnit $unit)
    {
        $days = $unit->inDays();

        $year = floor($days->getAmount() / Days::YEAR);
        $days = new Days($days->getAmount() - ($year * Days::YEAR));

        $month = floor($days->getAmount() / Days::MONTH);
        $days  = new Days($days->getAmount() - ($month * Days::MONTH));

        $week = floor($days->getAmount() / Days::WEEK);
        $days = new Days($days->getAmount() - ($week * Days::WEEK));

        $day  = floor($days->getAmount());
        $days = new Days($days->getAmount() - $day);

        $hour = floor($days->getAmount() * Days::HOURS);
        $days = new Days($days->getAmount() - ($hour / Days::HOURS));

        $minute = floor($days->getAmount() * Days::MINUTES);
        $days   = new Days($days->getAmount() - ($minute / Days::MINUTES));

        $second = ceil($days->getAmount() * Days::SECONDS);

        $this->years   = new Years($year);
        $this->months  = new Months($month);
        $this->weeks   = new Weeks($week);
        $this->days    = new Days($day);
        $this->hours   = new Hours($hour);
        $this->minutes = new Minutes($minute);
        $this->seconds = new Seconds($second);
    }

    /**
     * @return Years
     */
    final public function getYears(): Years
    {
        return $this->years;
    }

    /**
     * @return Months
     */
    final public function getMonths(): Months
    {
        return $this->months;
    }

    /**
     * @return Weeks
     */
    final public function getWeeks(): Weeks
    {
        return $this->weeks;
    }

    /**
     * @return Days
     */
    final public function getDays(): Days
    {
        return $this->days;
    }

    /**
     * @return Hours
     */
    final public function getHours(): Hours
    {
        return $this->hours;
    }

    /**
     * @return Minutes
     */
    final public function getMinutes(): Minutes
    {
        return $this->minutes;
    }

    /**
     * @return Seconds
     */
    final public function getSeconds(): Seconds
    {
        return $this->seconds;
    }
}