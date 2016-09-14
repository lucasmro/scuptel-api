<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\Entity\Plan;

class PlanTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePlanShouldReturnWithNameAndTimeInMinutesAndAdditionalMinuteRate()
    {
        $name = 'Fale Mais 30';
        $timeInMinutes = 30;
        $additionalMinuteRate = 0.1;

        $plan = new Plan($name, $timeInMinutes, $additionalMinuteRate);

        $this->assertEquals($name, $plan->getName());
        $this->assertEquals($timeInMinutes, $plan->getTimeInMinutes());
        $this->assertEquals($additionalMinuteRate, $plan->getAdditionalMinuteRate());
    }
}
