<?php

namespace Sprinklr\ScupTel\Application\Controller;

use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Sprinklr\ScupTel\Domain\Service\PriceSimulatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PriceSimulatorController extends ApiController
{
    const PRICE_SIMULATOR_REQUEST_DTO_NAMESPACE = 'Sprinklr\ScupTel\Domain\Dto\PriceSimulatorRequestDto';

    private $logger;
    private $priceSimulator;

    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        PriceSimulatorInterface $priceSimulator
    ) {
        parent::__construct($serializer);

        $this->logger = $logger;
        $this->priceSimulator = $priceSimulator;
    }

    public function simulate(Request $request)
    {
        $this->logger->addInfo('PriceSimulatorController :: simulate()');

        $simulationRequestDto = $this->getObjectFromRequest($request, self::PRICE_SIMULATOR_REQUEST_DTO_NAMESPACE);

        $simulations = $this->priceSimulator->simulateAll(
            $simulationRequestDto->getFromAreaCode(),
            $simulationRequestDto->getToAreaCode(),
            $simulationRequestDto->getTimeInMinutes()
        );

        return $this->buildResponse($request, $simulations, Response::HTTP_OK);
    }
}
