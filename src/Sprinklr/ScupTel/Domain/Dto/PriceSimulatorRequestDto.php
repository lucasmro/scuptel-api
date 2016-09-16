<?php

namespace Sprinklr\ScupTel\Domain\Dto;

class PriceSimulatorRequestDto
{
    private $fromAreaCode;
    private $toAreaCode;
    private $timeInMinutes;

    /**
     * SimulationRequestDto constructor.
     *
     * @param int $fromAreaCode
     * @param int $toAreaCode
     * @param int $timeInMinutes
     */
    public function __construct($fromAreaCode, $toAreaCode, $timeInMinutes)
    {
        $this->fromAreaCode = $fromAreaCode;
        $this->toAreaCode = $toAreaCode;
        $this->timeInMinutes = $timeInMinutes;
    }

    public function getFromAreaCode()
    {
        return $this->fromAreaCode;
    }

    public function getToAreaCode()
    {
        return $this->toAreaCode;
    }

    public function getTimeInMinutes()
    {
        return $this->timeInMinutes;
    }
}
