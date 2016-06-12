<?php

namespace Dgame\Time;

/**
 * Interface TimeConvert
 * @package Dgame\Time
 */
interface TimeConvert
{
    /**
     * @return Msecs
     */
    public function inMsecs() : Msecs;

    /**
     * @return Seconds
     */
    public function inSeconds() : Seconds;

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes;

    /**
     * @return Hours
     */
    public function inHours() : Hours;

    /**
     * @return Days
     */
    public function inDays() : Days;

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks;
}