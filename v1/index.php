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
require 'presenter/PresentComment.php';
require 'jdf.php';

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

$app->post('/saveComment',function (Request $req, Response $res){
    $postBody = $req->getParsedBody();
    $o_id = filter_var($postBody['o_id'],FILTER_SANITIZE_STRING);
    $que_text = filter_var($postBody['que_text'], FILTER_SANITIZE_STRING);
    $user_name = filter_var($postBody['user_name'],FILTER_SANITIZE_STRING);
    $user_mail = filter_var($postBody['user_mail'],FILTER_SANITIZE_STRING);
    PresentComment::saveComment($o_id, $que_text, $user_name, $user_mail);

});

$app->get('/getCommentByObjectId/{oId}', function (Request $req, Response $res, array $arq) {
    $result = PresentComment::getByObjectId($arq['oId']);
    clearstatcache();
    $res->getBody()->write($result);
    return $res;
});

$app->run();