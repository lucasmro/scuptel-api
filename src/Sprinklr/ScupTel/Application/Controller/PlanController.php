<?php

namespace Sprinklr\ScupTel\Application\Controller;

use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Sprinklr\ScupTel\Domain\Dto\CollectionDto;
use Sprinklr\ScupTel\Domain\Repository\PlanRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PlanController extends ApiController
{
    private $logger;
    private $repository;

    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        PlanRepositoryInterface $repository
    ) {
        parent::__construct($serializer, $validator);

        $this->logger = $logger;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $this->logger->addInfo('PlanController :: index()');

        $plans = $this->repository->findAll();

        $collection = new CollectionDto($plans);

        return $this->buildResponse($request, $collection, Response::HTTP_OK);
    }
}
