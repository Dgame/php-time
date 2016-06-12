<?php

namespace Dgame\Time;

/**
 * Class Seconds
 * @package Dgame\Time
 */
final class Seconds extends Time
{
    /**
     * @return Msecs
     */
    public function inMsecs() : Msecs
    {
        return msecs($this->asFloat() * 1000);
    }

    /**
     * @return Seconds
     */
    public function inSeconds() : Seconds
    {
        return $this;
    }

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes
    {
        return minutes($this->asFloat() / 60);
    }

    /**
     * @return Hours
     */
    public function inHours() : Hours
    {
        return $this->inMinutes()->inHours();
    }

    /**
     * @return Days
     */
    public function inDays() : Days
    {
        return $this->inHours()->inDays();
    }

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks
    {
        return $this->inDays()->inWeeks();
    }
}