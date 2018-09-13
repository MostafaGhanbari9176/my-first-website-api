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
require 'presenter/PresentVisitObject.php';
require 'presenter/PresentGrouping.php';

header("Access-Control-Allow-Origin: *");
header("Pragma: no-cache");

$app = new Slim\App();


$app->get('/getDownloadObjectByPageId/{pageId}', function (Request $req, Response $res, array $arq) {
    $result = PresentDownloadObject::getObjectByPageId($arq['pageId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->get('/getVisitObjectByPageId/{pageId}', function (Request $req, Response $res, array $arq) {
    $result = PresentVisitObject::getObjectByPageId($arq['pageId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->get('/getAllGrouping', function (Request $req, Response $res, array $arq) {
    $result = PresentGrouping::getAllObjects();
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->get('/getDownloadObjectByGroupingId/{gId}', function (Request $req, Response $res, array $arq) {
    $result = PresentDownloadObject::getObjectByGroupingId($arq['gId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->get('/getDownloadObjectByRootIdGrouping/{gId}', function (Request $req, Response $res, array $arq) {
    $result = PresentDownloadObject::getObjectByGroupingRootId($arq['gId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->get('/getVisitObjectByGroupingId/{gId}', function (Request $req, Response $res, array $arq) {
    $result = PresentVisitObject::getObjectByGroupingId($arq['gId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->get('/getVisitObjectByRootIdGrouping/{gId}', function (Request $req, Response $res, array $arq) {
    $result = PresentVisitObject::getObjectByGroupingRootId($arq['gId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->run();