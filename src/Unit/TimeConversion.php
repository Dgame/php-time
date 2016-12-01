<?php

namespace Dgame\Time\Unit;

/**
 * Interface TimeConversion
 * @package Dgame\Time\Unit
 */
interface TimeConversion
{
    /**
     * @return Seconds
     */
    public function inSeconds(): Seconds;

    /**
     * @return Minutes
     */
    public function inMinutes(): Minutes;

    /**
     * @return Hours
     */
    public function inHours(): Hours;

    /**
     * @return Days
     */
    public function inDays(): Days;

    /**
     * @return Weeks
     */
    public function inWeeks(): Weeks;

    /**
     * @return Months
     */
    public function inMonths(): Months;

    /**
     * @return Years
     */
    public function inYears(): Years;
}