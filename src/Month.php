<?php

declare(strict_types=1);

namespace Dgame\Time;

use Dgame\Time\Exception\InvalidMonthException;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;
use InvalidArgumentException;

final class Month
{
    private function __construct(private int $month, private int $year)
    {
    }

    public static function current(): self
    {
        return new self((int) \Safe\date('n'), (int) \Safe\date('Y'));
    }

    public static function of(string $month, int $year = null): self
    {
        $year   = $year ?? (int) \Safe\date('Y');
        $parsed = \Safe\date_parse($month);

        $parsed_month = $parsed['month'];
        if ($parsed_month !== false) {
            return new self($parsed_month, $year);
        }

        throw new InvalidMonthException($month);
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
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
        if (extension_loaded('calendar')) {
            return new Days(cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year));
        }

        throw new InvalidArgumentException('Cannot use "inDays" because the ext-calendar extension is missing');
    }

    public function inWeeks(): Weeks
    {
        return $this->inDays()->inWeeks();
    }
}
