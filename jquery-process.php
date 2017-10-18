<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/18/2017
 * Time: 3:45 AM
 */
require_once 'src/database.php';
$foodMenuPrimaryKey = isset($_POST['foodMenuPrimaryKey'])?$_POST['foodMenuPrimaryKey']:null;
if($foodMenuPrimaryKey!=null && !empty($foodMenuPrimaryKey)){
    $item = db_select("select * from foodmenu where id='".$foodMenuPrimaryKey."'");
    echo json_encode($item);

}