<?php

use Selective\BasePath\BasePathMiddleware;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return function (App $app){
    // parse json, form data and xml
    $app->addBodyParsingMiddleware();

    //Add the slim build-in routing middleware
    $app->addRoutingMiddleware();

    $app->add(BasePathMiddleware::class);

    //Catch exceptions and errors
    $app->add(ErrorMiddleware::class);
};