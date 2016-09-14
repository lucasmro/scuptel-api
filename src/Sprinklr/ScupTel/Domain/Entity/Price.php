<?php

namespace Sprinklr\ScupTel\Domain\Entity;

class Price
{
    private $fromAreaCode;
    private $toAreaCode;
    private $valuePerMinute;

    /**
     * Price constructor.
     *
     * @param \Sprinklr\ScupTel\Domain\Entity\AreaCode $fromAreaCode
     * @param \Sprinklr\ScupTel\Domain\Entity\AreaCode $toAreaCode
     * @param float $valuePerMinute
     */
    public function __construct(AreaCode $fromAreaCode, AreaCode $toAreaCode, $valuePerMinute)
    {
        $this->fromAreaCode = $fromAreaCode;
        $this->toAreaCode = $toAreaCode;
        $this->valuePerMinute = $valuePerMinute;
    }

    /**
     * Get fromAreaCode
     *
     * @return \Sprinklr\ScupTel\Domain\Entity\AreaCode $fromAreaCode
     */
    public function getFromAreaCode()
    {
        return $this->fromAreaCode;
    }

    /**
     * Get toAreaCode
     *
     * @return \Sprinklr\ScupTel\Domain\Entity\AreaCode $toAreaCode
     */
    public function getToAreaCode()
    {
        return $this->toAreaCode;
    }

    /**
     * Get valuePerMinute
     *
     * @return float $fromAreaCode
     */
    public function getValuePerMinute()
    {
        return $this->valuePerMinute;
    }
}