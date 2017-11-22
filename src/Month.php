<?php

namespace Dgame\Time;

use Dgame\Time\Exception\InvalidMonthException;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\Weeks;

/**
 * Class Month
 * @package Dgame\Time
 */
final class Month
{
    /**
     * @var int
     */
    private $month = 0;
    /**
     * @var int
     */
    private $year = 0;

    /**
     * Month constructor.
     *
     * @param int $month
     * @param int $year
     */
    private function __construct(int $month, int $year)
    {
        $this->month = $month;
        $this->year  = $year;
    }

    /**
     * @return Month
     */
    public static function current(): self
    {
        return new self(date('n'), date('Y'));
    }

    /**
     * @param          $month
     * @param int|null $year
     *
     * @return Month
     * @throws InvalidMonthException
     */
    public static function of(string $month, int $year = null): self
    {
        $year  = $year === null ? date('Y') : $year;
        $month = date_parse($month)['month'];
        if ($month !== false) {
            return new self($month, $year);
        }

        throw new InvalidMonthException($month);
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds
    {
        return $this->inMinutes()->inSeconds();
    }

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes
    {
        return $this->inHours()->inMinutes();
    }

    /**
     * @return Hours
     */
    public function inHours(): Hours
    {
        return $this->inDays()->inHours();
    }

    /**
     * @return Days
     */
    public function inDays(): Days
    {
        return new Days(cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year));
    }

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks
    {
        return $this->inDays()->inWeeks();
    }
}