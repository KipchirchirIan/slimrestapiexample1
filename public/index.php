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

// Load environment variables
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Include the DB connection file
require __DIR__ . '/../src/config/config.php';
require __DIR__ . '/../src/config/db.php';

// Create a Slim instance
$app = AppFactory::create();

// Add routing middleware
$app->addRoutingMiddleware();

// Add Error handling middleware
$errorMiddleware = $app->addErrorMiddleware(true, false, false);

// test route
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Welcome!!");
    return $response;
});

// Include Art routes
$art_routes = require __DIR__ . '/../src/routes/art.php';
$art_routes($app);

// Execute application
$app->run();