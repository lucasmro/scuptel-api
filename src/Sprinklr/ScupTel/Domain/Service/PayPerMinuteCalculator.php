<?php

namespace Sprinklr\ScupTel\Domain\Service;

use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;

class PayPerMinuteCalculator implements CalculatorInterface
{
    public function calculate($timeInMinutes, Price $price, Plan $plan)
    {
        return $timeInMinutes * $price->getValuePerMinute();
    }
}
