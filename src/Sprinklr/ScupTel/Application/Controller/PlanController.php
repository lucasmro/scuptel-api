<?php

namespace Sprinklr\ScupTel\Application\Controller;

use JMS\Serializer\SerializerInterface;
use Sprinklr\ScupTel\Domain\Repository\PlanRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends ApiController
{
    private $repository;

    public function __construct(
        SerializerInterface $serializer,
        PlanRepositoryInterface $repository
    ) {
        parent::__construct($serializer);

        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $plans = $this->repository->findAll();

        return $this->buildResponse($request, $plans, Response::HTTP_OK);
    }
}
