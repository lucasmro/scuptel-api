<?php

namespace Sprinklr\ScupTel\Tests\Domain\Service;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Domain\Entity\NullPrice;
use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;
use Sprinklr\ScupTel\Domain\Service\NullPriceCalculator;

class NullPriceCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new NullPriceCalculator();
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
                100,
                new NullPrice(),
                PlanData::createPlanFaleMais30(),
                null
            ),
            array(
                100,
                PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol(),
                PlanData::createPlanFaleMais30(),
                null
            ),
        );
    }
}
