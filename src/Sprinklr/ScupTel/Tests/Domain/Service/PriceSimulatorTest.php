<?php

namespace Sprinklr\ScupTel\Tests\Domain\Service;

use Sprinklr\ScupTel\Domain\Service\CalculatorFactory;
use Sprinklr\ScupTel\Domain\Service\PriceSimulator;
use Sprinklr\ScupTel\Infrastructure\Repository\PlanRepository;
use Sprinklr\ScupTel\Infrastructure\Repository\PriceRepository;

class PriceSimulatorTest extends \PHPUnit_Framework_TestCase
{
    private $simulator;

    protected function setUp()
    {
        $this->simulator = new PriceSimulator(
            new CalculatorFactory(),
            new PriceRepository(),
            new PlanRepository()
        );
    }

    protected function tearDown()
    {
        $this->simulator = null;
    }

    public function testSimulatorShouldReturnFourPricesWhenGivenParametersAreValid()
    {
        $fromAreaCode = 18;
        $toAreaCode = 11;
        $timeInMinutes = 200;

        $simulations = $this->simulator->simulateAll($fromAreaCode, $toAreaCode, $timeInMinutes);

        $this->assertCount(4, $simulations);
        $this->assertEquals(355.3, $simulations['falemais-30']);
        $this->assertEquals(292.6, $simulations['falemais-60']);
        $this->assertEquals(167.2, $simulations['falemais-120']);
        $this->assertEquals(380.0, $simulations['no-plan']);
    }

    public function testSimulatorShouldReturnFourNullPricesWhenGivenParametersAreNotValid()
    {
        $fromAreaCode = 12;
        $toAreaCode = 21;
        $timeInMinutes = 100;

        $simulations = $this->simulator->simulateAll($fromAreaCode, $toAreaCode, $timeInMinutes);

        $this->assertCount(4, $simulations);
        $this->assertNull($simulations['falemais-30']);
        $this->assertNull($simulations['falemais-60']);
        $this->assertNull($simulations['falemais-120']);
        $this->assertNull($simulations['no-plan']);
    }
}
