<?php

namespace Dgame\Time;

use Dgame\Time\Exception\InvalidMonthException;
use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\TimeConversionInterface;
use Dgame\Time\Unit\Weeks;
use Dgame\Time\Unit\Years;

/**
 * Class Month
 * @package Dgame\Time
 */
final class Month implements TimeConversionInterface
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
     * @return Month
     */
    public static function Current(): Month
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
    public static function Of($month, int $year = null): Month
    {
        $year = $year === null ? date('Y'): $year;
        if (is_string($month)) {
            $month = date_parse($month)['month'];
        }

        if (!empty($month)) {
            return new self($month, $year);
        }

        throw new InvalidMonthException($month);
    }

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

    /**
     * @return Months
     */
    public function inMonths(): Months
    {
        return $this->inWeeks()->inMonths();
    }

    /**
     * @return Years
     */
    public function inYears(): Years
    {
        return $this->inWeeks()->inYears();
    }
}