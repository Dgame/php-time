<?php

namespace Dgame\Time\Unit;

/**
 * Interface TimeUnitInterface
 * @package Dgame\Time\Unit
 */
interface TimeUnitInterface extends TimeConversionInterface
{
    /**
     * @return float
     */
    public function getAmount(): float;

    /**
     * @param float $time
     *
     * @return bool
     */
    public function equalsAmount(float $time): bool;

    /**
     * @param TimeUnitInterface $unit
     *
     * @return bool
     */
    public function equals(self $unit): bool;

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function add(self $unit): self;

    /**
     * @param TimeUnitInterface $unit
     *
     * @return TimeUnitInterface
     */
    public function subtract(self $unit): self;
}