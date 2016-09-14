<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\Entity\NullPlan;

class NullPlanTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePlanShouldReturnWithNameAndTimeInMinutesAndAdditionalMinuteRate()
    {
        $plan = new NullPlan();

        $this->assertEmpty($plan->getName());
        $this->assertEquals(0, $plan->getTimeInMinutes());
        $this->assertEquals(0.0, $plan->getAdditionalMinuteRate());
    }
}
