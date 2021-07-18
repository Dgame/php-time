<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

abstract class AbstractTimeUnit implements TimeUnit
{
    final public function __construct(private float $time = 0.0)
    {
    }

    final public function getAmount(): float
    {
        return $this->time;
    }

    final public function equalsAmount(float $time): bool
    {
        return abs($this->time - $time) < PHP_FLOAT_EPSILON;
    }

    final public function __toString(): string
    {
        return (string) $this->time;
    }
}
