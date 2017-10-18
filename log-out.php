<?php
/**
 * Created by PhpStorm.
 * User: SHUVO
 * Date: 10/11/2017
 * Time: 2:20 AM
 */
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
unset($_SESSION['username']);
if(isset($_SESSION['type'])) unset($_SESSION['type']);
header('location: Login-page.php');