<?php

namespace Dgame\Time;

/**
 * Class Days
 * @package Dgame\Time
 */
final class Days extends Time
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
        return hours($this->asFloat() * 24);
    }

    /**
     * @return Days
     */
    public function inDays() : Days
    {
        return $this;
    }

    /**
     * @return Weeks
     */
    public function inWeeks() : Weeks
    {
        return weeks($this->asFloat() / 7);
    }
}