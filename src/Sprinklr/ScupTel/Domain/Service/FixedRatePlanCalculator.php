<?php

namespace Sprinklr\ScupTel\Domain\Service;

use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;

class FixedRatePlanCalculator implements CalculatorInterface
{
    public function calculate($timeInMinutes, Price $price, Plan $plan)
    {
        $exceededTimeInMinutes = 0;

        if ($timeInMinutes > $plan->getTimeInMinutes()) {
            $exceededTimeInMinutes = $timeInMinutes - $plan->getTimeInMinutes();
        }

        return $exceededTimeInMinutes * $price->getValuePerMinute() * (1 + $plan->getAdditionalMinuteRate());
    }
}
