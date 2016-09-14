<?php

namespace Sprinklr\ScupTel\Domain\Service;

use Sprinklr\ScupTel\Domain\Entity\NullPlan;
use Sprinklr\ScupTel\Domain\Entity\NullPrice;
use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;

class CalculatorFactory
{
    public function create(Price $price, Plan $plan)
    {
        if ($price instanceof NullPrice) {
            return new NullPriceCalculator();
        }

        if ($plan instanceof NullPlan) {
            return new PayPerMinuteCalculator();
        }

        return new FixedRatePlanCalculator();
    }
}
