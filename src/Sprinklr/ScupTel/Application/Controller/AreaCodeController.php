<?php

namespace Sprinklr\ScupTel\Application\Controller;

use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Sprinklr\ScupTel\Domain\Dto\CollectionDto;
use Sprinklr\ScupTel\Domain\Repository\AreaCodeRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AreaCodeController extends ApiController
{
    private $logger;
    private $repository;

    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        AreaCodeRepositoryInterface $repository
    ) {
        parent::__construct($serializer, $validator);

        $this->logger = $logger;
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $this->logger->addInfo('AreaCodeController :: index()');

        $entities = $this->repository->findAll();

        $collection = new CollectionDto($entities);

        return $this->buildResponse($request, $collection, Response::HTTP_OK);
    }
}
