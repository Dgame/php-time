<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Weeks extends AbstractTimeUnit
{
    public const WEEKS_PER_MONTH = 4.35;
    public const WEEKS_PER_YEAR  = 52.2;

    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_WEEK);
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() * Minutes::MINUTES_PER_WEEK);
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() * Hours::HOURS_PER_WEEK);
    }

    public function inDays(): Days
    {
        return new Days($this->getAmount() * Days::DAYS_PER_WEEK);
    }

    public function inWeeks(): self
    {
        return $this;
    }

    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::WEEKS_PER_MONTH);
    }

    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::WEEKS_PER_YEAR);
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inWeeks()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inWeeks()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inWeeks()->getAmount());
    }
}
