<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/6/2017
 * Time: 5:03 PM
 */
require_once 'src/database.php';
$query = 'select * from student';
$data = db_process($query);
foreach ($data as $datum){
    echo $datum['name'].$datum['address'].$datum['discipline'].'<br>';
}
