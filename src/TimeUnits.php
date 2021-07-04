<?php

namespace Dgame\Time;

use DateInterval;
use DateTime;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\TimeUnitInterface;
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
     * TimeUnits constructor.
     *
     * @param TimeUnitInterface $unit
     */
    public function __construct(TimeUnitInterface $unit)
    {
        $seconds     = $unit->inSeconds()->getAmount();
        $this->years = floor($seconds / Seconds::SECONDS_PER_YEAR);

        $seconds -= $this->years * Seconds::SECONDS_PER_YEAR;
        $this->months = floor($seconds / Seconds::SECONDS_PER_MONTH);

        $seconds -= $this->months * Seconds::SECONDS_PER_MONTH;
        $this->weeks = floor($seconds / Seconds::SECONDS_PER_WEEK);

        $seconds -= $this->weeks * Seconds::SECONDS_PER_WEEK;
        $this->days = floor($seconds / Seconds::SECONDS_PER_DAY);

        $seconds -= $this->days * Seconds::SECONDS_PER_DAY;
        $this->hours = floor($seconds / Seconds::SECONDS_PER_HOUR);

        $seconds -= $this->hours * Seconds::SECONDS_PER_HOUR;
        $this->minutes = floor($seconds / Seconds::SECONDS_PER_MINUTE);

        $this->seconds = round($seconds - ($this->minutes * Seconds::SECONDS_PER_MINUTE), 2);

        if (abs($this->seconds - Seconds::SECONDS_PER_MINUTE) < 0.01) {
            $this->minutes++;
            $this->seconds = 0.0;
        }
    }

    /**
     * @param DateInterval $interval
     *
     * @return TimeUnits
     */
    public static function from(DateInterval $interval): self
    {
        $days = $interval->days;
        assert($days !== false);

        return new self(new Days((float) $days));
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