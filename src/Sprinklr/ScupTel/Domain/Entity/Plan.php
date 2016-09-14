<?php

namespace Sprinklr\ScupTel\Domain\Entity;

class Plan
{
    private $name;
    private $timeInMinutes;
    private $additionalMinuteRate;

    /**
     * Plan constructor.
     *
     * @param string $name
     * @param int $timeInMinutes
     * @param float $additionalMinuteRate
     */
    public function __construct($name, $timeInMinutes, $additionalMinuteRate)
    {
        $this->name = $name;
        $this->timeInMinutes = $timeInMinutes;
        $this->additionalMinuteRate = $additionalMinuteRate;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get timeInMinutes
     *
     * @return int $timeInMinutes
     */
    public function getTimeInMinutes()
    {
        return $this->timeInMinutes;
    }

    /**
     * Get AdditionalMinuteRate
     *
     * @return float $additionalMinuteRate
     */
    public function getAdditionalMinuteRate()
    {
        return $this->additionalMinuteRate;
    }
}
