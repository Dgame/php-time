<?php

declare(strict_types=1);

namespace Dgame\Time;

use DateInterval;
use DateTime;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use function Dgame\Time\Unit\seconds;
use Dgame\Time\Unit\TimeUnit;
use Dgame\Time\Unit\Weeks;
use Dgame\Time\Unit\Years;

final class TimeUnits
{
    private float $years;
    private float $months;
    private float $weeks;
    private float $days;
    private float $hours;
    private float $minutes;
    private float $seconds;

    public function __construct(TimeUnit $unit)
    {
        $seconds     = $unit->inSeconds()->getAmount();
        $this->years = floor($seconds / Seconds::SECONDS_PER_YEAR);

        $seconds      -= $this->years * Seconds::SECONDS_PER_YEAR;
        $this->months = floor($seconds / Seconds::SECONDS_PER_MONTH);

        $seconds     -= $this->months * Seconds::SECONDS_PER_MONTH;
        $this->weeks = floor($seconds / Seconds::SECONDS_PER_WEEK);

        $seconds    -= $this->weeks * Seconds::SECONDS_PER_WEEK;
        $this->days = floor($seconds / Seconds::SECONDS_PER_DAY);

        $seconds     -= $this->days * Seconds::SECONDS_PER_DAY;
        $this->hours = floor($seconds / Seconds::SECONDS_PER_HOUR);

        $seconds       -= $this->hours * Seconds::SECONDS_PER_HOUR;
        $this->minutes = floor($seconds / Seconds::SECONDS_PER_MINUTE);

        $this->seconds = round($seconds - ($this->minutes * Seconds::SECONDS_PER_MINUTE), 2);

        if (seconds($this->seconds)->equalsAmount(Seconds::SECONDS_PER_MINUTE)) {
            $this->minutes++;
            $this->seconds = 0.0;
        }
    }

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
     * @return static
     */
    public static function diff(DateTime $date, DateTime $now = null): self
    {
        $now ??= new \Safe\DateTime();

        return self::from($date->diff($now));
    }

    public function getYears(): Years
    {
        return new Years($this->years);
    }

    public function getMonths(): Months
    {
        return new Months($this->months);
    }

    public function getWeeks(): Weeks
    {
        return new Weeks($this->weeks);
    }

    public function getDays(): Days
    {
        return new Days($this->days);
    }

    public function getHours(): Hours
    {
        return new Hours($this->hours);
    }

    public function getMinutes(): Minutes
    {
        return new Minutes($this->minutes);
    }

    public function getSeconds(): Seconds
    {
        return new Seconds($this->seconds);
    }
}
