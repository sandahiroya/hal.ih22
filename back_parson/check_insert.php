<?php
session_start();



if(!empty($_SESSION['info'])){
    $info = $_SESSION['info']['login_name'];
    $password = $_SESSION['info']['login_password'];
   
}

if(!empty($_POST['return'])){
    // $_SESSION['info'] = $_POST;
    header("location: new_insert.php");
}

if(!empty($_POST['comp'])){
    require_once 'const.php';

    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

    if(!$link){
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
    require_once './tpl/error.php';
    exit;
    }

    mysqli_set_charset($link,'utf8');

    $name = $_SESSION['info']['login_name'];
    $password = $_SESSION['info']['login_password'];

    $password = password_hash($password,PASSWORD_DEFAULT);

    $sql = "SELECT COUNT(*) FROM administrator";
    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラーです１";
    }

    $id = mysqli_fetch_all($result);
    $id = (int)$id[0][0] + 1;



    $sql = "INSERT INTO administrator(administrator_id,administrator_name,password) VALUE(".$id.",'".$name."','".$password."')";
    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラーです２";
    }

    header("location: comp_insert.php");
}

require_once "tpl/check_insert.php";