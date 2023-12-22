<?php
    session_start();
    define('SECURITY', True);
    include_once('config/connect.php');
    if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
        include_once('admin.php');
    }else{
        include_once('login.php');
    }
?>