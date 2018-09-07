<?php
/**
 * Created by PhpStorm.
 * User: Mostafa
 * Date: 08/09/2018
 * Time: 12:03 AM
 */

require_once '../uses/DBConnection.php';

class DownloadObject
{

    private $tableName = "download_object";
    private $con;
    /**
     * DownloadObject constructor.
     */
    public function __construct()
    {
        $this->con = (new DBConnection())->connect();

        mysqli_query($this->con, "SET NAMES 'utf8'");
        mysqli_set_charset($this->con, "UTF8");
    }

    public function getObjectByPageId($pageId){

        $sql = "SELECT * FROM $this->tableName  WHERE page_id = ?";
        $result = $this->con->prepare($sql);
        $result->bind_param('s', $pageId);
        $result->execute();
        return $result->get_result();


    }
}