<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 11/09/2018
 * Time: 07:50 PM
 */
require_once '../uses/DBConnection.php';
class Grouping
{


    private $con;
    private $tableName = "grouping";
    /**
     * Grouping constructor.
     */
    public function __construct()
    {

        $this->con = (new DBConnection())->connect();
        mysqli_query($this->con, "SET NAMES 'utf8'");
        mysqli_set_charset($this->con, "UTF8");
    }

    public function getAllObjects(){
        $sql = "SELECT * FROM $this->tableName";
        $result = $this->con->prepare($sql);
        $result->execute();
        return $result->get_result();
    }

    public function getObjectsByRootId($rootId){
        $sql = "SELECT * FROM $this->tableName WHERE root_id = ?";
        $result = $this->con->prepare($sql);
        $result->bind_param('i',$rootId);
        $result->execute();
        return $result->get_result();
    }
}