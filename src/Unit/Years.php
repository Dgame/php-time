<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Years extends AbstractTimeUnit
{
    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_YEAR);
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_YEAR);
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_YEAR);
    }

    public function inDays(): Days
    {
        return new Days($this->getAmount() * Days::DAYS_PER_YEAR);
    }

    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() * Weeks::WEEKS_PER_YEAR);
    }

    public function inMonths(): Months
    {
        return new Months($this->getAmount() * Months::MONTHS_PER_YEAR);
    }

    public function inYears(): self
    {
        return $this;
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inYears()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inYears()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inYears()->getAmount());
    }
}
