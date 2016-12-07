<?php
    error_reporting(0);
    session_start();
    $sys_name       = "New System";
    $sys_short_name = substr($sys_name,0,3);
    $user_name      = $_SESSION['user_name'];
    $user_position  = $_SESSION['user_position'];
    $user_email     = $_SESSION['user_email'];
    $count_messages = $_SESSION['count_message'];
    if ($user_position !=""){
        $security = "true";
    }else{
        $security = "false";
    }
?>