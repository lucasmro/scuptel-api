<?php

namespace Sprinklr\ScupTel\Domain\Dto;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class PriceSimulatorRequestDto
{
    private $fromAreaCode;
    private $toAreaCode;
    private $timeInMinutes;

    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('fromAreaCode', new Assert\NotBlank());
        $metadata->addPropertyConstraint('toAreaCode', new Assert\NotBlank());
        $metadata->addPropertyConstraint('timeInMinutes', new Assert\NotBlank());
    }

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
