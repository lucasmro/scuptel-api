<?php

namespace Sprinklr\ScupTel\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
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
}
