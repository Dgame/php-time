<?php

namespace Dgame\Time;

use Dgame\Time\Unit\Days;
use Dgame\Time\Unit\Hours;
use Dgame\Time\Unit\Minutes;
use Dgame\Time\Unit\Months;
use Dgame\Time\Unit\Seconds;
use Dgame\Time\Unit\TimeConversionInterface;
use Dgame\Time\Unit\Weeks;
use Dgame\Time\Unit\Years;

/**
 * Class Year
 * @package Dgame\Time
 */
final class Year implements TimeConversionInterface
{
    /**
     * @var int
     */
    private $year = 0;

    /**
     * @return Year
     */
    public static function Current(): Year
    {
        return self::Of(date('Y'));
    }

    /**
     * @param int $year
     *
     * @return Year
     */
    public static function Of(int $year): Year
    {
        return new self($year);
    }

    /**
     * Year constructor.
     *
     * @param int $year
     */
    private function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return bool
     */
    public function isLeapyear(): bool
    {
        return ($this->year % 400) === 0 || (($this->year % 4) === 0 && ($this->year % 100) !== 0);
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
        return new Days($this->isLeapyear() ? 366 : 365);
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