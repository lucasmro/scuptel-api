<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app->get('/', function(Request $request) use ($app) {
    return "ScupTel";
});
