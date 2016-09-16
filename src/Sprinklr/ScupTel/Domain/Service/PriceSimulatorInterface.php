<?php

namespace Sprinklr\ScupTel\Domain\Service;

interface PriceSimulatorInterface
{
    public function simulateAll($fromAreaCode, $toAreaCode, $timeInMinutes);
}
