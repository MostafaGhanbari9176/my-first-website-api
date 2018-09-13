<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 08/09/2018
 * Time: 02:36 PM
 */

require_once 'model/VisitObject.php';

class PresentVisitObject
{

    public static function getObjectByPageId($pageId)
    {

        $result = (new VisitObject())->getObjectByPageId($pageId);
        $resultData = array();
        while ($row = $result->fetch_assoc()) {
            $row['empty'] = 0;
            $resultData[] = $row;
        }
        if (!$resultData) {
            $message = array();
            $message['empty'] = 1;
            $resultData [] = $message;
        }

        return json_encode($resultData);
    }

    public static function getObjectByGroupingId($groupId){

        $result = (new VisitObject())->getObjectByGroupingId($groupId);
        $resultData = array();
        while ($row = $result->fetch_assoc()) {
            $row['empty'] = 0;
            $resultData[] = $row;
        }
        if(!$resultData)
        {
            $message = array();
            $message['empty'] = 1;
            $resultData[] = $message;
        }

        return json_encode($resultData);
    }

    public static function getObjectByGroupingRootId($rootId){
        $groupArray = (new Grouping)->getObjectsByRootId($rootId);
        $resultData = array();
        $sql = "";
        while ($row = $groupArray->fetch_assoc()){
            $sql = $sql . " group_id = ".$row['g_id']." OR";
        }
        if(strlen($sql) > 0) {
            $sql = rtrim($sql, "OR");
            $result = (new VisitObject())->getObjectByGroupingIString($sql);
            while ($row = $result->fetch_assoc()) {
                $row['empty'] = 0;
                $resultData[] = $row;
            }
        }
        if(!$resultData)
        {
            $message = array();
            $message['empty'] = 1;
            $resultData[] = $message;
        }

        return json_encode($resultData);
    }

}