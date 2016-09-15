<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

// Config
$app['debug'] = true;

// Providers
$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

// Routes
$app->get('/', function(Request $request) use ($app) {
    return "ScupTel";
});

// Error Handler
ErrorHandler::register();

$app->error(function (\Exception $e, Request $request, $code) use ($app) {

    // Show full stack trace for 500 errors when debug mode is true
    if ($app['debug'] && 500 === $code) {
        $handler = new ExceptionHandler();
        $handler->handle($e);
    }

    $headers = array('Content-Type' => 'application/json');

    $errorResponse = array(
        'status' => $code,
        'message' => $e->getMessage()
    );

    // Bad request errors
    if (400 === $code) {
        $validationErrors = json_decode($e->getMessage(), true);

        $errors = array();
        foreach ($validationErrors as $key => $value) {
            $errors[] = array('field' => $key, 'message' => $value);
        }

        $errorResponse['message'] = 'Validation errors';
        $errorResponse['errors'] = $errors;
    }

    return new JsonResponse($errorResponse, $code, $headers);
});
