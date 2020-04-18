<?php
/**
 * Created by PhpStorm.
 * Author: Ian Kipchirchir
 * Date: 4/18/20
 * Time: 6:38 AM
 */

// Use namespace for HTTP Request
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
// use namespace for Slim framework
use Slim\Factory\AppFactory;

// Include the Slim framework
require __DIR__ . '/../vendor/autoload.php';

// Include the DB connection file
require __DIR__ . '/../src/config/db.php';

// Create a Slim instance
$app = AppFactory::create();

// Add routing middleware
$app->addRoutingMiddleware();

// Add Error handling middleware
$errorMiddleware = $app->addErrorMiddleware(true, false, false);

// Execute application
$app->run();