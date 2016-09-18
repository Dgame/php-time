<?php

namespace Dgame\Time\Unit;

/**
 * @param float $time
 *
 * @return Seconds
 */
function seconds(float $time): Seconds
{
    return new Seconds($time);
}

/**
 * @param float $time
 *
 * @return Minutes
 */
function minutes(float $time): Minutes
{
    return new Minutes($time);
}

/**
 * @param float $time
 *
 * @return Hours
 */
function hours(float $time): Hours
{
    return new Hours($time);
}

/**
 * @param float $time
 *
 * @return Days
 */
function days(float $time): Days
{
    return new Days($time);
}

/**
 * @param float $time
 *
 * @return Weeks
 */
function weeks(float $time): Weeks
{
    return new Weeks($time);
}

/**
 * @param float $time
 *
 * @return Months
 */
function months(float $time): Months
{
    return new Months($time);
}

/**
 * @param float $time
 *
 * @return Years
 */
function years(float $time): Years
{
    return new Years($time);
}