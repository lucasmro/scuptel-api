<?php

namespace Sprinklr\ScupTel\Domain\Service;

use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;

interface CalculatorInterface
{
    public function calculate($timeInMinutes, Price $price, Plan $plan);
}
