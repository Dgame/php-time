<?php

namespace Dgame\Time;

/**
 * Class Weeks
 * @package Dgame\Time
 */
final class Weeks extends Time
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
        return $this->inHours()->inMinutes();
    }

    /**
     * @return Hours
     */
    public function inHours() : Hours
    {
        return $this->inDays()->inHours();
    }

    /**
     * @return Days
     */
    public function inDays() : Days
    {
        return days($this->asFloat() * 7);
    }

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks
    {
        return $this;
    }
}