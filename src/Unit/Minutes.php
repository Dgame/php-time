<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Minutes extends AbstractTimeUnit
{
    public const MINUTES_PER_HOUR   = 60;
    public const MINUTES_PER_DAY    = 1440;
    public const MINUTES_PER_WEEK   = 10080;
    public const MINUTES_PER_MONTH  = 43848;
    public const MINUTES_PER_YEAR   = 525600;

    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() * Seconds::SECONDS_PER_MINUTE);
    }

    public function inMinutes(): self
    {
        return $this;
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() / self::MINUTES_PER_HOUR);
    }

    public function inDays(): Days
    {
        return new Days($this->getAmount() / self::MINUTES_PER_DAY);
    }

    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::MINUTES_PER_WEEK);
    }

    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::MINUTES_PER_MONTH);
    }

    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::MINUTES_PER_YEAR);
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inMinutes()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inMinutes()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inMinutes()->getAmount());
    }
}
