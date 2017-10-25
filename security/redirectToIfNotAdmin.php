<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/24/2017
 * Time: 4:44 AM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])||!isset($_SESSION['username'])||strcmp($_SESSION['type'],'admin')){
    header('location: index.php');
}
