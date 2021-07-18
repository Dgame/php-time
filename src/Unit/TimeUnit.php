<?php

declare(strict_types=1);

namespace Dgame\Time\Unit;

interface TimeUnit extends TimeConversion
{
    public function getAmount(): float;

    public function equalsAmount(float $time): bool;

    public function equals(self $unit): bool;

    public function add(self $unit): self;

    public function subtract(self $unit): self;
}
