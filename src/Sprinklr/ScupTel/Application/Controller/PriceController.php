<?php

namespace Sprinklr\ScupTel\Application\Controller;

use JMS\Serializer\SerializerInterface;
use Sprinklr\ScupTel\Domain\Dto\CollectionDto;
use Sprinklr\ScupTel\Domain\Repository\PriceRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PriceController extends ApiController
{
    private $repository;

    public function __construct(
        SerializerInterface $serializer,
        PriceRepositoryInterface $repository
    ) {
        parent::__construct($serializer);

        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $entities = $this->repository->findAll();

        $collection = new CollectionDto($entities);

        return $this->buildResponse($request, $collection, Response::HTTP_OK);
    }
}
