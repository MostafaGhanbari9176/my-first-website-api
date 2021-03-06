<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 07/09/2018
 * Time: 11:42 PM
 */

require_once 'model/DownloadObject.php';
require_once 'DataModel/StDownloadObject.php';

class PresentDownloadObject
{
    public static function getObjectByPageId($pageId){

        $result = (new DownloadObject())->getObjectByPageId($pageId);
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

    public static function getObjectByGroupingId($groupId){

        $result = (new DownloadObject())->getObjectByGroupingId($groupId);
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
            $result = (new DownloadObject())->getObjectByGroupingIString($sql);
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