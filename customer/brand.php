<?php
session_start(); //セッションスタート

if(empty($_SESSION['user'])){
    header("location: login.php");
}

//--------------------------------[DB接続]--------------------------------//
//----DB接続----//
require_once "const.php";
$link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
mysqli_set_charset($link, 'utf8'); //文字コード設定

//--------------------------------[カテゴリー処理]--------------------------------//
//----プルダウンメニュー----//
$sql = "SELECT brand_id,brand_name FROM brand"; //カテゴリーとid生成sql構文
$sql = mysqli_query($link, $sql); //カテゴリーとid構文実行
$brand = mysqli_fetch_all($sql); //カテゴリーとid全て取得

//--------------------------------[tplのinsert]--------------------------------//
//----表示ファイル読み込み----//
require_once "tpl/brand.php";//insert.php読み込み