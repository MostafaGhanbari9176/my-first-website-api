<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 08/09/2018
 * Time: 02:36 PM
 */

require_once '../uses/DBConnection.php';

class VisitObject
{

    private $con;
    private $tableName = "visit_object";

    /**
     * VisitObject constructor.
     */
    public function __construct()
    {
        $this->con = (new DBConnection())->connect();
        mysqli_query($this->con, "SET NAMES 'utf8'");
        mysqli_set_charset($this->con, "UTF8");
    }

    public function getObjectByPageId($pageName){

        $sql = "SELECT * FROM $this->tableName WHERE page_id = ?";
        $result = $this->con->prepare($sql);
        $result->bind_param('s',$pageName);
        $result->execute();
        return $result->get_result();

    }

    public function getObjectByGroupingId($groupId){

        $sql = "SELECT * FROM $this->tableName  WHERE group_id = ? ";
        $result = $this->con->prepare($sql);
        $result->bind_param('i', $groupId);
        $result->execute();
        return $result->get_result();


    }

    public function getObjectByGroupingIString($str){

        $sql = "SELECT * FROM $this->tableName  WHERE $str";
        $result = $this->con->prepare($sql);
        $result->execute();
        return $result->get_result();


    }
}