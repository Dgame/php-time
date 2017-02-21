<?php

namespace Dgame\Time;

use DateInterval;
use DateTime;
use Dgame\Time\Unit\AbstractTimeUnit;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use Dgame\Time\Unit\Years;

/**
 * Class TimeUnits
 * @package Dgame\Time
 */
final class TimeUnits
{
    /**
     * @var float
     */
    private $years = 0.0;
    /**
     * @var float
     */
    private $months = 0.0;
    /**
     * @var float
     */
    private $weeks = 0.0;
    /**
     * @var float
     */
    private $days = 0.0;
    /**
     * @var float
     */
    private $hours = 0.0;
    /**
     * @var float
     */
    private $minutes = 0.0;
    /**
     * @var float
     */
    private $seconds = 0.0;

    /**
     * Date constructor.
     *
     * @param AbstractTimeUnit $unit
     */
    public function __construct(AbstractTimeUnit $unit)
    {
        $days        = $unit->inDays();
        $years       = $days->getAmount() / Days::DAYS_PER_YEAR;
        $this->years = floor($years);
        $result      = round($years - $this->years, 4);

        $days         = $result * Days::DAYS_PER_YEAR;
        $month        = $days / Days::DAYS_PER_MONTH;
        $this->months = floor($month);
        $result       = round($month - $this->months, 4);

        $days        = $result * Days::DAYS_PER_MONTH;
        $weeks       = $days / Days::DAYS_PER_WEEK;
        $this->weeks = floor($weeks);
        $result      = round($weeks - $this->weeks, 4);

        $days        = $result * Days::DAYS_PER_WEEK;
        $result      = round($days - floor($days), 4);
        $hours       = $result * Hours::HOURS_PER_DAY;
        $this->hours = floor($hours);
        $result      = round($hours - $this->hours, 4);

        $this->days    = floor($days);
        $minutes       = $result * Minutes::MINUTES_PER_HOUR;
        $this->minutes = floor($minutes);
        $result        = round($minutes - $this->minutes, 4);
        $this->seconds = $result * Seconds::SECONDS_PER_MINUTE;
    }

    /**
     * @param DateInterval $interval
     *
     * @return TimeUnits
     */
    public static function from(DateInterval $interval): self
    {
        return new self(new Days($interval->days));
    }

    /**
     * @param DateTime      $date
     * @param DateTime|null $now
     *
     * @return TimeUnits
     */
    public static function diff(DateTime $date, DateTime $now = null): self
    {
        $now = $now ?? new DateTime();

        return self::from($date->diff($now));
    }

    /**
     * @return Years
     */
    public function getYears(): Years
    {
        return new Years($this->years);
    }

    /**
     * @return Months
     */
    public function getMonths(): Months
    {
        return new Months($this->months);
    }

    /**
     * @return Weeks
     */
    public function getWeeks(): Weeks
    {
        return new Weeks($this->weeks);
    }

    /**
     * @return Days
     */
    public function getDays(): Days
    {
        return new Days($this->days);
    }

    /**
     * @return Hours
     */
    public function getHours(): Hours
    {
        return new Hours($this->hours);
    }

    /**
     * @return Minutes
     */
    public function getMinutes(): Minutes
    {
        return new Minutes($this->minutes);
    }

    /**
     * @return Seconds
     */
    public function getSeconds(): Seconds
    {
        return new Seconds($this->seconds);
    }
}