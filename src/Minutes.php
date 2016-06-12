<?php

namespace Dgame\Time;

/**
 * Class Minutes
 * @package Dgame\Time
 */
final class Minutes extends Time
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
        return seconds($this->asFloat() * 60.0);
    }

    /**
     * @return Minutes
     */
    public function inMinutes() : Minutes
    {
        return $this;
    }

    /**
     * @return Hours
     */
    public function inHours() : Hours
    {
        return hours($this->asFloat() / 60.0);
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