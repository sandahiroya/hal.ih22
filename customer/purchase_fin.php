<?php
require_once 'const.php';
session_start();

if(empty($_SESSION['user'])){
  header("location: login.php");
}

$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

if(!$link){
  $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
  require_once './tpl/error.php';
  exit;
}


mysqli_set_charset($link,'utf8');






  
require_once './tpl/purchase_fin.php';
?>