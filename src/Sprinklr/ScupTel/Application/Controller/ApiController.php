<?php

namespace Sprinklr\ScupTel\Application\Controller;


use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class ApiController
{
    const CONTENT_TYPE_JSON = 'json';

    protected $serializer;
    protected $validator;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
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

    protected function getObjectFromRequest(Request $request, $className, $groups = array())
    {
        $deserializationContext = DeserializationContext::create();

        if (!empty($groups)) {
            $deserializationContext->setGroups($groups);
        }

        return $this->serializer->deserialize(
            $request->getContent(),
            $className,
            $request->getContentType(),
            $deserializationContext
        );

    }

    protected function validate($object)
    {
        $validation_errors = $this->validator->validate($object);

        if (count($validation_errors) == 0) {
            return;
        }

        $errors = array();

        foreach ($validation_errors as $error) {
            $errors[$error->getPropertyPath()] = $error->getMessage();
        }

        throw new BadRequestHttpException(json_encode($errors));
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
