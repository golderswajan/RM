<?php

function db_insert($query){
    $con = db_connect();
    $con->query($query);
    $con->close();
}

function db_update($query){
   db_insert($query);
}

function db_delete($query){
    db_insert($query);
}

function db_select($query){
    $con = db_connect();
    $rows = $con->query($query);
    $data=[];
    if($rows==null){
        echo "Database query failed";
        return $data;
    }else {
        $rows = $rows->fetch_all(MYSQLI_BOTH);
        foreach ($rows as $row){
            array_push($data,$row);
        }
        $con->close();
    }
    return $data;

}
function db_connect(){
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="resturant";
    $con= new mysqli($serverName,$userName,$password,$dbName);
    if($con->connect_errno){
        die("coonection failed".$con->connect_error);
    }else {

        return $con;
    }


}



