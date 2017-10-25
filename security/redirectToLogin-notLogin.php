<?php
/**
 * Created by PhpStorm.
 * User: DreamLess
 * Date: 10/18/2017
 * Time: 8:52 AM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
