<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

function msecs(float $time): Milliseconds
{
    return new Milliseconds($time);
}

function seconds(float $time): Seconds
{
    return new Seconds($time);
}

function minutes(float $time): Minutes
{
    return new Minutes($time);
}

function hours(float $time): Hours
{
    return new Hours($time);
}

function days(float $time): Days
{
    return new Days($time);
}

function weeks(float $time): Weeks
{
    return new Weeks($time);
}

function months(float $time): Months
{
    return new Months($time);
}

function years(float $time): Years
{
    return new Years($time);
}
