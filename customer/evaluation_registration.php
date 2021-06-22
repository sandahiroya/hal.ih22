<?php
session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}

$_SESSION['c_id'] = $_GET['id'];



// 表示部分に使う変数に値を代入
$good = "良い";
$normal = "普通";
$bad = "悪い";



require_once "./tpl/evaluation_registration.php";
