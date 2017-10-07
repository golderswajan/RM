<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/6/2017
 * Time: 3:19 PM
 */
function db_process($query){
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="varsity";
    $data=[];
    $con = new mysqli($serverName,$userName,$password,$dbName);
    if($con->connect_errno){
        dile("coonection failed".$con->connect_error);
    }else{
        $rows = $con->query($query);
        $rows = $rows->fetch_all(MYSQLI_BOTH);
        foreach ($rows as $row){
            array_push($data,$row);

        }
        $con->close();
    }
    return $data;
}
