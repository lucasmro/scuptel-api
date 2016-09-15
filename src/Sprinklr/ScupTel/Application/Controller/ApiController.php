<?php

namespace Sprinklr\ScupTel\Application\Controller;


use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiController
{
    const CONTENT_TYPE_JSON = 'json';

    protected $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function buildResponse(Request $request, $data, $code = Response::HTTP_OK, $groups = array())
    {
        $headers = array(
            'Content-Type' => self::CONTENT_TYPE_JSON
        );

        return new Response(
            $this->serialize($data),
            $code,
            $headers
        );
    }

    protected function serialize($data, $format = 'json', $groups = array())
    {
        $serializationContext = $this->getSerializationContext($groups);

        return $this->serializer->serialize($data, $format, $serializationContext);
    }

    private function getSerializationContext($groups = array())
    {
        $serializationContext = SerializationContext::create();

        if (!empty($groups)) {
            $serializationContext->setGroups($groups);
        }

        return $serializationContext;
    }
}
