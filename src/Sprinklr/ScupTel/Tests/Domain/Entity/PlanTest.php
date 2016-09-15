<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;

class PlanTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePlanShouldCreateValidPlanFaleMais30()
    {
        $plan = PlanData::createPlanFaleMais30();

        $this->assertEquals('falemais-30', $plan->getSlug());
        $this->assertEquals('FaleMais 30', $plan->getName());
        $this->assertEquals(30, $plan->getTimeInMinutes());
        $this->assertEquals(0.1, $plan->getAdditionalMinuteRate());
    }

    public function testCreatePlanShouldCreateValidPlanFaleMais60()
    {
        $plan = PlanData::createPlanFaleMais60();

        $this->assertEquals('falemais-60', $plan->getSlug());
        $this->assertEquals('FaleMais 60', $plan->getName());
        $this->assertEquals(60, $plan->getTimeInMinutes());
        $this->assertEquals(0.1, $plan->getAdditionalMinuteRate());
    }

    public function testCreatePlanShouldCreateValidPlanFaleMais120()
    {
        $plan = PlanData::createPlanFaleMais120();

        $this->assertEquals('falemais-120', $plan->getSlug());
        $this->assertEquals('FaleMais 120', $plan->getName());
        $this->assertEquals(120, $plan->getTimeInMinutes());
        $this->assertEquals(0.1, $plan->getAdditionalMinuteRate());
    }
}
