<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Seconds extends AbstractTimeUnit
{
    public const SECONDS_PER_MINUTE = 60;
    public const SECONDS_PER_HOUR   = 3600;
    public const SECONDS_PER_DAY    = 86400;
    public const SECONDS_PER_WEEK   = 604800;
    public const SECONDS_PER_MONTH  = 2630880;
    public const SECONDS_PER_YEAR   = 31536000;

    public function inSeconds(): self
    {
        return $this;
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() / self::SECONDS_PER_MINUTE);
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() / self::SECONDS_PER_HOUR);
    }

    public function inDays(): Days
    {
        return new Days($this->getAmount() / self::SECONDS_PER_DAY);
    }

    public function inWeeks(): Weeks
    {
        return new Weeks($this->getAmount() / self::SECONDS_PER_WEEK);
    }

    public function inMonths(): Months
    {
        return new Months($this->getAmount() / self::SECONDS_PER_MONTH);
    }

    public function inYears(): Years
    {
        return new Years($this->getAmount() / self::SECONDS_PER_YEAR);
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + $unit->inSeconds()->getAmount());
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - $unit->inSeconds()->getAmount());
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount($unit->inSeconds()->getAmount());
    }
}
