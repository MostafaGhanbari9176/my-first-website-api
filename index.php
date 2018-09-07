<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 07/09/2018
 * Time: 07:48 PM
 */

require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/',function(\Slim\Http\Request $req, \Slim\Http\Response $res){
    $res->getBody()->write("TODO");
});

$app->run();