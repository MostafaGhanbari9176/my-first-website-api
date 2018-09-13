<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 11/09/2018
 * Time: 07:55 PM
 */
require_once 'model/Grouping.php';
require_once 'DataModel/StGrouping.php';
class PresentGrouping
{

    public static function getAllObjects(){

        $result = (new Grouping())->getAllObjects();
        $resultData = array();
        while ($row = $result->fetch_assoc()){
            $row['empty'] = 0;
            $resultData[] = $row;
        }
        if(!$resultData){
            $message = array();
            $message['empty'] = 1;
            $resultData[] = $message;
        }

        return json_encode($resultData);
}

    public static function getObjectsByRootId($rootId){

        $result = (new Grouping())->getObjectsByRootId($rootId);
        $resultData = array();
        while ($row = $result->fetch_assoc()){
            $row['empty'] = 0;
            $resultData[] = $row;
        }
        if(!$resultData){
            $message = array();
            $message['empty'] = 1;
            $resultData[] = $message;
        }

        return json_encode($resultData);
    }

}