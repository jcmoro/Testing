<?php

namespace Techniques\SelfShuntTechnique;

class Vehicle
{
    /** @var float */
    private $speed = 0.0;

    /**
     * @param Speed $speed
     *
     * @return Vehicle
     */
    public function updateSpeed(Speed $speed): self
    {
        $this->speed = $speed->value();

        return $this;
    }

    /**
     * Returns if the vehicle goes over speed.
     *
     * @param Speed $overSpeed
     *
     * @return bool
     */
    public function isOverSpeeding(Speed $overSpeed): bool
    {
        return $this->speed() > $overSpeed->value();
    }

    /**
     * Returns the current vehicle speed.
     *
     * @return float
     */
    public function speed(): float
    {
        return $this->speed;
    }
}
