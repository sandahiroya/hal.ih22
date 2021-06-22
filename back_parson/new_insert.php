<?php
session_start();

if(!empty($_POST['return'])){
    header("location: login.php");
}

if(!empty($_SESSION['info'])){
    $name = $_SESSION['info']['login_name'];
    $password  = $_SESSION['info']['login_password'];
}

if(!empty($_POST['check'])){
    if(empty($_POST['login_name'])){
        $mess = "ログインIDを入力してください";
    }elseif(empty($_POST['login_password'])){
        $mess = "パスワードを入力してください";
    }else{
        $_SESSION['info'] = $_POST;
        header("location: check_insert.php");
    }

}

// var_dump($_POST['check']);

// var_dump($_POST['login_id']);




require_once "tpl/new_insert.php";
