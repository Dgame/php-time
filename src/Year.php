<?php

declare(strict_types=1);

namespace Dgame\Time;

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;

final class Year
{
    private function __construct(private int $year)
    {
    }

    public static function current(): self
    {
        return self::of((int) \Safe\date('Y'));
    }

    public static function of(int $year): self
    {
        return new self($year);
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function isLeapyear(): bool
    {
        return ($this->year % 400) === 0 || (($this->year % 4) === 0 && ($this->year % 100) !== 0);
    }

    public function inSeconds(): Seconds
    {
        return $this->inMinutes()->inSeconds();
    }

    public function inMinutes(): Minutes
    {
        return $this->inHours()->inMinutes();
    }

    public function inHours(): Hours
    {
        return $this->inDays()->inHours();
    }

    public function inDays(): Days
    {
        return new Days($this->isLeapyear() ? 366 : 365);
    }

    public function inWeeks(): Weeks
    {
        return $this->inDays()->inWeeks();
    }

    public function inMonths(): Months
    {
        return $this->inWeeks()->inMonths();
    }
}
