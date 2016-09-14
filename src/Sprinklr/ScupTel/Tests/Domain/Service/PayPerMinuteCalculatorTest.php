<?php

namespace Sprinklr\ScupTel\Tests\Domain\Service;

use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Domain\Entity\NullPlan;
use Sprinklr\ScupTel\Domain\Entity\Plan;
use Sprinklr\ScupTel\Domain\Entity\Price;
use Sprinklr\ScupTel\Domain\Service\PayPerMinuteCalculator;

class PayPerMinutePriceCalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new PayPerMinuteCalculator();
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
                new NullPlan(),
                38.0
            ),
            array(
                80,
                PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol(),
                new NullPlan(),
                136.0
            ),
            array(
                200,
                PriceData::createPriceFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo(),
                new NullPlan(),
                380.0
            ),
        );
    }
}
