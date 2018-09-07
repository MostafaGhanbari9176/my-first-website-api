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
        while ($row = $result->fetch_assoc())
            $resultData[] = $row;
        if(!$resultData)
        {
            $message = array();
            $message['empty'] = 1;
            $resultData[] = $message;
        }

        return json_encode($resultData);
    }

}