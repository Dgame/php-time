<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Days extends AbstractTimeUnit
{
    public const DAYS_PER_WEEK  = 7;
    public const DAYS_PER_MONTH = 30.45;
    public const DAYS_PER_YEAR  = 365;

    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_DAY);
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_DAY);
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_DAY);
    }

    public function inDays(): self
    {
        return $this;
    }

    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::DAYS_PER_WEEK);
    }

    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::DAYS_PER_MONTH);
    }

    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::DAYS_PER_YEAR);
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inDays()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inDays()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inDays()->getAmount());
    }
}
