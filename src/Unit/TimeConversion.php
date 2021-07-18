<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

interface TimeConversion
{
    public function inSeconds(): Seconds;

    public function inMinutes(): Minutes;

    public function inHours(): Hours;

    public function inDays(): Days;

    public function inWeeks(): Weeks;

    public function inMonths(): Months;

    public function inYears(): Years;
}
