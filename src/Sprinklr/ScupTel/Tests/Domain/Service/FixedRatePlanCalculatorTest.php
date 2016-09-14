<?php

namespace Sprinklr\ScupTel\Tests\Domain\Service;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;
use Sprinklr\ScupTel\Domain\Service\FixedRatePlanCalculator;

class FixedRatePlanCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new FixedRatePlanCalculator();
    }

    protected function tearDown()
    {
        $this->calculator = null;
    }

    /**
     * @dataProvider calculateProvider
     */
    public function testCalculate($timeInMinutes, Price $price, Plan $plan, $expected)
    {
        $result = $this->calculator->calculate($timeInMinutes, $price, $plan);

        $this->assertEquals($expected, $result);
    }

    public function calculateProvider()
    {
        return array(
            array(
                20,
                PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto(),
                PlanData::createPlanFaleMais30(),
                0.0
            ),
            array(
                80,
                PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol(),
                PlanData::createPlanFaleMais60(),
                37.4
            ),
            array(
                200,
                PriceData::createPriceFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo(),
                PlanData::createPlanFaleMais120(),
                167.2
            ),
        );
    }
}
