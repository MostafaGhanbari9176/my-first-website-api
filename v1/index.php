<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 07/09/2018
 * Time: 07:48 PM
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require 'presenter/PresentDownloadObject.php';
$app = new Slim\App();








$app->get('/getDownloadObjectByPageId/{pageId}',function(Request $req, Response $res){
    $result = PresentDownloadObject::getObjectByPageId($req->getAttribute('pageId'));
    $res->getBody()->write($result);
});

$app->run();