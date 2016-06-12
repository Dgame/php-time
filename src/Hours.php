<?php

namespace Dgame\Time;

/**
 * Class Hours
 * @package Dgame\Time
 */
final class Hours extends Time
{
    /**
     * @return Msecs
     */
    public function inMsecs() : Msecs
    {
        return $this->inSeconds()->inMsecs();
    }

    /**
     * @return Seconds
     */
    public function inSeconds() : Seconds
    {
        return $this->inMinutes()->inSeconds();
    }

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes
    {
        return minutes($this->asFloat() * 60.0);
    }

    /**
     * @return Hours
     */
    public function inHours() : Hours
    {
        return $this;
    }

    /**
     * @return Days
     */
    public function inDays() : Days
    {
        return days($this->asFloat() / 24.0);
    }

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks
    {
        return $this->inDays()->inWeeks();
    }
}