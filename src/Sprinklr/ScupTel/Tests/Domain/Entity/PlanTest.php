<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;

class PlanTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePlanShouldReturnWithNameAndTimeInMinutesAndAdditionalMinuteRate()
    {
        $plan = PlanData::createPlanFaleMais30();

        $this->assertEquals('Fale Mais 30', $plan->getName());
        $this->assertEquals(30, $plan->getTimeInMinutes());
        $this->assertEquals(0.1, $plan->getAdditionalMinuteRate());
    }
}
