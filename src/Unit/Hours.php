<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Hours extends AbstractTimeUnit
{
    public const HOURS_PER_DAY   = 24;
    public const HOURS_PER_WEEK  = 168;
    public const HOURS_PER_MONTH = 730.8;
    public const HOURS_PER_YEAR  = 8760;

    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_HOUR);
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_HOUR);
    }

    public function inHours(): self
    {
        return $this;
    }

    public function inDays(): Days
    {
        return new Days($this->getAmount() / self::HOURS_PER_DAY);
    }

    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::HOURS_PER_WEEK);
    }

    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::HOURS_PER_MONTH);
    }

    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::HOURS_PER_YEAR);
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inHours()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inHours()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inHours()->getAmount());
    }
}
