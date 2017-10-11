<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/6/2017
 * Time: 5:03 PM
 */
require_once 'src/database.php';
$query = 'select * from customer';
$data = db_select($query);
echo $data[0]['name'].$data[0]['address'];
