<?php

namespace Sprinklr\ScupTel\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
use Sprinklr\ScupTel\Domain\Entity\NullPlan;
use Sprinklr\ScupTel\Domain\Repository\PlanRepositoryInterface;

class PlanRepository implements PlanRepositoryInterface
{
    public function findAll()
    {
        return array(
            PlanData::createPlanFaleMais30(),
            PlanData::createPlanFaleMais60(),
            PlanData::createPlanFaleMais120(),
        );
    }

    public function find($slug)
    {
        $plans = array(
            'falemais-30' => PlanData::createPlanFaleMais30(),
            'falemais-60' => PlanData::createPlanFaleMais60(),
            'falemais-120' => PlanData::createPlanFaleMais120(),
        );

        if (false === array_key_exists($slug, $plans)) {
            return new NullPlan();
        }

        return $plans[$slug];
    }
}
