<?php
session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}

$_SESSION['product_info'] = $_POST;



require_once "./tpl/insert_img.php";
