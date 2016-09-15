<?php

namespace Sprinklr\ScupTel\Application\Controller;


use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController
{
    protected $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function buildResponse(Request $request, $data, $code = Response::HTTP_OK, $groups = array())
    {
        $format = $this->getFormat($request);
        $headers = array();

        return new Response(
            $this->serialize($data, $format, $groups),
            $code,
            $headers
        );
    }

    protected function serialize($data, $format = 'json', $groups = array())
    {
        $serializationContext = $this->getSerializationContext($groups);

        return $this->serializer->serialize($data, $format, $serializationContext);
    }

    private function getFormat(Request $request)
    {
        if ('json' === $request->getContentType() || 'xml' === $request->getContentType()) {
            return $request->getContentType();
        }

        return 'json';
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
