<?php

namespace Dgame\Time;

/**
 * Class Msecs
 * @package Dgame\Time
 */
final class Msecs extends Time
{
    /**
     * @return Msecs
     */
    public function inMsecs() : Msecs
    {
        return $this;
    }

    /**
     * @return Seconds
     */
    public function inSeconds() : Seconds
    {
        return seconds($this->asFloat() / 1000);
    }

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes
    {
        return $this->inSeconds()->inMinutes();
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