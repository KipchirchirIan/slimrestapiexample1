<?php
/**
 * Created by PhpStorm.
 * Author: Ian Kipchirchir
 * Date: 4/18/20
 * Time: 7:58 AM
 */
use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Get Art
 */

// create GET HTTP request for art
return function (App $app) {
    $app->get('/api/v1/art', function (Request $request, Response $response) {
        $sql = "SELECT * FROM ART";

        try {
            // Get DB object
            $db = new Db();

            // Connect to db
            $db = $db->connect();

            // Execute query
            $stmt = $db->query($sql);
            $arts = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null; // clear DB object

            $payload = json_encode($arts, JSON_INVALID_UTF8_SUBSTITUTE);
            // print out result as JSON format
            $response->getBody()->write($payload);

        } catch (PDOException $e) {
            // show error message as Json format
            $payload = '{"error": {"msg": ' . $e->getMessage() . '}';
            $response->getBody()->write($payload);
        }

        return $response->withHeader('Content-Type', 'application/json');
    });
};