<?php
session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}


require_once "./tpl/change.php";
