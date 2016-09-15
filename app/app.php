<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

// Config
$app['debug'] = true;
$app['serializer.cache.dir'] =__DIR__.'/../app/cache/serializer';
$app['serializer.debug'] = false;

// Services
$app['area.code.repository'] = function($app) {
    return new \Sprinklr\ScupTel\Infrastructure\Repository\AreaCodeRepository();
};

$app['plan.repository'] = function($app) {
    return new \Sprinklr\ScupTel\Infrastructure\Repository\PlanRepository();
};

$app['area.code.controller'] = function($app) {
    return new \Sprinklr\ScupTel\Application\Controller\AreaCodeController(
        $app['serializer'],
        $app['area.code.repository']
    );
};

$app['plan.controller'] = function($app) {
    return new \Sprinklr\ScupTel\Application\Controller\PlanController(
        $app['serializer'],
        $app['plan.repository']
    );
};

$app['serializer'] = function ($app) {
    $serializerBuilder = JMS\Serializer\SerializerBuilder::create();
    $serializerBuilder->setCacheDir($app['serializer.cache.dir']);
    $serializerBuilder->setDebug($app['serializer.debug']);
    $serializerBuilder->addMetadataDir(
        __DIR__ . '/../src/Sprinklr/ScupTel/Domain/Resources/config/serializer', 'Sprinklr\ScupTel\Domain\Entity'
    );

    return $serializerBuilder->build();
};

// Providers
$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

// Routes
$app->get('/', function(Request $request) use ($app) {
    return "ScupTel";
});

$app->get('/plans', 'plan.controller:index');

$app->get('/area-codes', 'area.code.controller:index');

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
