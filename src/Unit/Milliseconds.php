<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

final class Milliseconds extends AbstractTimeUnit
{
    public const MSECS_PER_SECOND = 1000;
    public const MSECS_PER_MINUTE = Seconds::SECONDS_PER_MINUTE * self::MSECS_PER_SECOND;
    public const MSECS_PER_HOUR   = Seconds::SECONDS_PER_HOUR * self::MSECS_PER_SECOND;

    public function inSeconds(): Seconds
    {
        return new Seconds($this->getAmount() / self::MSECS_PER_SECOND);
    }

    public function inMinutes(): Minutes
    {
        return new Minutes($this->getAmount() / self::MSECS_PER_MINUTE);
    }

    public function inHours(): Hours
    {
        return new Hours($this->getAmount() / self::MSECS_PER_HOUR);
    }

    public function inDays(): Days
    {
        return $this->inHours()->inDays();
    }

    public function inWeeks(): Weeks
    {
        return $this->inDays()->inWeeks();
    }

    public function inMonths(): Months
    {
        return $this->inWeeks()->inMonths();
    }

    public function inYears(): Years
    {
        return $this->inMonths()->inYears();
    }

    public function equals(TimeUnit $unit): bool
    {
        return $this->equalsAmount(self::inMsecs($unit));
    }

    public function add(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() + self::inMsecs($unit));
    }

    public function subtract(TimeUnit $unit): TimeUnit
    {
        return new self($this->getAmount() - self::inMsecs($unit));
    }

    private static function inMsecs(TimeUnit $unit): float
    {
        return $unit->inSeconds()->getAmount() * self::MSECS_PER_SECOND;
    }
}
