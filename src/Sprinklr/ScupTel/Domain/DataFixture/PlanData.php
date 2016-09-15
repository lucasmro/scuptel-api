<?php

namespace Sprinklr\ScupTel\Domain\DataFixture;

use Sprinklr\ScupTel\Domain\Entity\Plan;

class PlanData
{
    public static function createPlanFaleMais30()
    {
        return new Plan('falemais-30', 'FaleMais 30', 30, 0.1);
    }

    public static function createPlanFaleMais60()
    {
        return new Plan('falemais-60', 'FaleMais 60', 60, 0.1);
    }

    public static function createPlanFaleMais120()
    {
        return new Plan('falemais-120', 'FaleMais 120', 120, 0.1);
    }
}
