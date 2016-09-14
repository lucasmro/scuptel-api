<?php

namespace Sprinklr\ScupTel\Tests\Domain\Service;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Domain\Entity\NullPlan;
use Sprinklr\ScupTel\Domain\Entity\NullPrice;
use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;
use Sprinklr\ScupTel\Domain\Service\CalculatorFactory;

class CalculatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    protected function setUp()
    {
        $this->factory = new CalculatorFactory();
    }

    protected function tearDown()
    {
        $this->factory = null;
    }

    /**
     * @dataProvider factoryProvider
     */
    public function testCalculatorFactory(Price $price, Plan $plan, $expected)
    {
        $this->assertInstanceOf($expected, $this->factory->create($price, $plan));
    }

    public function factoryProvider()
    {
        return array(
            array(
                new NullPrice(),
                new NullPlan(),
                'Sprinklr\ScupTel\Domain\Service\NullPriceCalculator'
            ),
            array(
                PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto(),
                new NullPlan(),
                'Sprinklr\ScupTel\Domain\Service\PayPerMinuteCalculator'
            ),
            array(
                PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto(),
                PlanData::createPlanFaleMais30(),
                'Sprinklr\ScupTel\Domain\Service\FixedRatePlanCalculator'
            ),
        );
    }
}
