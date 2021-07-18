<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Months extends AbstractTimeUnit
{
    public const MONTHS_PER_YEAR = 12;

    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_MONTH);
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_MONTH);
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_MONTH);
    }

    public function inDays(): Days
    {
        return new Days($this->getAmount() * Days::DAYS_PER_MONTH);
    }

    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() * Weeks::WEEKS_PER_MONTH);
    }

    public function inMonths(): self
    {
        return $this;
    }

    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::MONTHS_PER_YEAR);
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inMonths()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inMonths()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inMonths()->getAmount());
    }
}
