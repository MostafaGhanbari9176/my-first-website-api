<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 15/09/2018
 * Time: 04:29 PM
 */
require_once 'model/Comment.php';
require_once 'DataModel/StComment.php';
class PresentComment
{


    public static function saveComment($o_id, $que_text, $user_name, $user_mail){

        $result = (new Comment())->saveComment($o_id, $que_text, getJDate(null), $user_name, $user_mail);

    }

    public static function getByObjectId($oId){
        $result = (new Comment())->getByObjectId($oId);
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
}