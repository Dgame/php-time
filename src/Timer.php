<?php

namespace Dgame\Time;

use Dgame\Time\Unit\Milliseconds;

/**
 * Class Timer
 * @package Dgame\Time
 */
final class Timer
{
    const EPSILON            = 0.00001;
    const DEFAULT_PRECISION  = 4;
    const INTERNAL_PRECISION = self::DEFAULT_PRECISION * 2;
    const TIME_UNITS         = [
        'hour'   => Milliseconds::MSECS_PER_HOUR,
        'minute' => Milliseconds::MSECS_PER_MINUTE,
        'second' => Milliseconds::MSECS_PER_SECOND
    ];

    /**
     * @var float[]
     */
    private $timings = [];

    /**
     *
     */
    public function start(): void
    {
        $this->timings[] = microtime(true);
    }

    /**
     * @return Milliseconds
     */
    public function peek(): Milliseconds
    {
        $amount = microtime(true) - end($this->timings);

        return new Milliseconds($amount * Milliseconds::MSECS_PER_SECOND);
    }

    /**
     * @return Milliseconds
     */
    public function stop(): Milliseconds
    {
        $amount = microtime(true) - array_pop($this->timings);

        return new Milliseconds($amount * Milliseconds::MSECS_PER_SECOND);
    }

    /**
     * @param Milliseconds $milliseconds
     * @param int          $precision
     *
     * @return string
     */
    public static function convert(Milliseconds $milliseconds, int $precision = self::DEFAULT_PRECISION): string
    {
        $ms = round($milliseconds->getAmount(), self::INTERNAL_PRECISION);
        foreach (self::TIME_UNITS as $unit => $value) {
            if ($ms >= $value) {
                $time = round($ms / $value * 100.0, self::INTERNAL_PRECISION) / 100.0;

                return round($time, $precision) . ' ' . (self::equals(round($time, 0), 1) ? $unit : $unit . 's');
            }
        }

        return round($ms, $precision) . ' ms';
    }

    /**
     * @param float $lhs
     * @param float $rhs
     *
     * @return bool
     */
    public static function equals(float $lhs, float $rhs): bool
    {
        return abs($lhs - $rhs) < self::EPSILON;
    }
}