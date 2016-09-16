<?php

namespace Sprinklr\ScupTel\Domain\Service;

use Sprinklr\ScupTel\Domain\Entity\NullPlan;
use Sprinklr\ScupTel\Domain\Repository\PlanRepositoryInterface;
use Sprinklr\ScupTel\Domain\Repository\PriceRepositoryInterface;

class PriceSimulator implements PriceSimulatorInterface
{
    private $calculatorFactory;
    private $priceRepository;
    private $planRepository;

    /**
     * PriceSimulator constructor.
     *
     * @param CalculatorFactory $calculatorFactory
     * @param PriceRepositoryInterface $priceRepository
     * @param PlanRepositoryInterface $planRepository
     */
    public function __construct(
        CalculatorFactory $calculatorFactory,
        PriceRepositoryInterface $priceRepository,
        PlanRepositoryInterface $planRepository
    ) {
        $this->calculatorFactory = $calculatorFactory;
        $this->priceRepository = $priceRepository;
        $this->planRepository = $planRepository;
    }

    /**
     * Simulate price for all possible options (all plans + no plan)
     *
     * @param $fromAreaCode
     * @param $toAreaCode
     * @param $timeInMinutes
     * @return array
     */
    public function simulateAll($fromAreaCode, $toAreaCode, $timeInMinutes)
    {
        $simulations = array();

        $plans = $this->planRepository->findAll();
        $price = $this->priceRepository->find($fromAreaCode, $toAreaCode);

        // All Plans
        foreach($plans as $plan) {
            $calculator = $this->calculatorFactory->create($price, $plan);
            $simulations[$plan->getSlug()] = $calculator->calculate($timeInMinutes, $price, $plan);
        }

        // Without Plan (Normal)
        $simulations['no-plan'] = $calculator->calculate($timeInMinutes, $price, new NullPlan());

        return $simulations;
    }
}
