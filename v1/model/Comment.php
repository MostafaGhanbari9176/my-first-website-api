<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 15/09/2018
 * Time: 04:11 PM
 */

class Comment
{

    private $tableName = "comment_data";
    private $con;

    public function __construct()
    {
        $this->con = (new DBConnection())->connect();

        mysqli_query($this->con, "SET NAMES 'utf8'");
        mysqli_set_charset($this->con, "UTF8");
    }

    public function saveComment($o_id, $que_text, $com_date, $user_name, $user_mail){
        $sql = "INSERT INTO $this->tableName (`o_id`, `que_text`, `com_date`, `user_name`, `user_mail`) VALUES (?, ?, ?, ?, ?)";
        $result = $this->con->prepare($sql);
        $result->bind_param('sssss',$o_id, $que_text, $com_date, $user_name, $user_mail);
        $result->execute();
        return 1;

    }

    public function getByObjectId($oId){

        $sql = "SELECT * FROM $this->tableName WHERE o_id = ? ";
        $result = $this->con->prepare($sql);
        $result->bind_param('s',$oId);
        $result->execute();
        return $result->get_result();
    }
}