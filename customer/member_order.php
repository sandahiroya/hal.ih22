<?php

session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}

require_once "./member_tpl/member_order.php";