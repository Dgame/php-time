<?php

declare(strict_types=1);

namespace Dgame\Time;

use Dgame\Time\Unit\Milliseconds;

final class Timer
{
    private const DEFAULT_PRECISION  = 4;
    private const INTERNAL_PRECISION = self::DEFAULT_PRECISION * 2;
    private const TIME_UNITS         = [
        'hour'   => Milliseconds::MSECS_PER_HOUR,
        'minute' => Milliseconds::MSECS_PER_MINUTE,
        'second' => Milliseconds::MSECS_PER_SECOND
    ];

    /**
     * @var float[]
     */
    private array $timings = [];

    public function start(): void
    {
        $this->timings[] = microtime(true);
    }

    public function peek(): Milliseconds
    {
        $amount = microtime(true) - (float) end($this->timings);

        return new Milliseconds($amount * Milliseconds::MSECS_PER_SECOND);
    }

    public function stop(): Milliseconds
    {
        $amount = microtime(true) - (float) array_pop($this->timings);

        return new Milliseconds($amount * Milliseconds::MSECS_PER_SECOND);
    }

    public static function convert(Milliseconds $milliseconds, int $precision = self::DEFAULT_PRECISION): string
    {
        $ms = round($milliseconds->getAmount(), self::INTERNAL_PRECISION);
        foreach (self::TIME_UNITS as $unit => $value) {
            if ($ms >= $value) {
                $time = round($ms / $value * 100.0, self::INTERNAL_PRECISION) / 100.0;

                return round($time, $precision) . ' ' . (abs(round($time) - 1) < PHP_FLOAT_EPSILON ? $unit : $unit . 's');
            }
        }

        return round($ms, $precision) . ' ms';
    }
}
