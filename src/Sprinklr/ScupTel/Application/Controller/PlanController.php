<?php

namespace Sprinklr\ScupTel\Application\Controller;

use JMS\Serializer\SerializerInterface;
use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends ApiController
{
    public function __construct(SerializerInterface $serializer)
    {
        parent::__construct($serializer);
    }

    public function index(Request $request)
    {
        // TODO: Refactor
        $plan = PlanData::createPlanFaleMais60();

        return $this->buildResponse($request, $plan, Response::HTTP_OK);
    }
}
