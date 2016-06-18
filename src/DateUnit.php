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
 * Class DateUnit
 * @package Dgame\Time
 */
final class DateUnit
{
    /**
     * @var Years|null
     */
    private $years = null;
    /**
     * @var Months|null
     */
    private $months = null;
    /**
     * @var Weeks|null
     */
    private $weeks = null;
    /**
     * @var Days|null
     */
    private $days = null;
    /**
     * @var Hours|null
     */
    private $hours = null;
    /**
     * @var Minutes|null
     */
    private $minutes = null;
    /**
     * @var Seconds|null
     */
    private $seconds = null;

    /**
     * Date constructor.
     *
     * @param TimeUnit $unit
     */
    public function __construct(TimeUnit $unit)
    {
        $days = $unit->inDays();

        //        var_dump($days);

        $year = floor($days->getAmount() / Days::YEAR);
        $days = new Days($days->getAmount() - ($year * Days::YEAR));

        //        var_dump($year);
        //        var_dump($days);

        $month = floor($days->getAmount() / Days::MONTH);
        $days  = new Days($days->getAmount() - ($month * Days::MONTH));

        //        var_dump($month);
        //        var_dump($days);

        $week = floor($days->getAmount() / Days::WEEK);
        $days = new Days($days->getAmount() - ($week * Days::WEEK));

        //        var_dump($week);
        //        var_dump($days);

        $day  = floor($days->getAmount());
        $days = new Days($days->getAmount() - $day);

        //        var_dump($day);
        //        var_dump($days);

        $hour = floor($days->getAmount() * Days::HOURS);
        $days = new Days($days->getAmount() - ($hour / Days::HOURS));

        //        var_dump($hour);
        //        var_dump($days);

        $minute = floor($days->getAmount() * Days::MINUTES);
        $days   = new Days($days->getAmount() - ($minute / Days::MINUTES));

        //        var_dump($min);
        //        var_dump($days);

        $second = ceil($days->getAmount() * Days::SECONDS);
        //        var_dump($seconds);

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