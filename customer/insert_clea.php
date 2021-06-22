<?php
session_start(); //セッションスタート

if(empty($_SESSION['user'])){
    header("location: login.php");
}

// var_dump($_SESSION['product_info']['product_info']);
//--------------------------------[txtエラー処理]--------------------------------//
// ----商品txt----//
if (empty($_SESSION['product_info']["title"])) { //値が空かチェック(商品タイトル)
    $title = "商品タイトル未入力です"; //値が無けば未入力と表示
} else {
    $title = $_SESSION['product_info']["title"]; //値があればtru
};
//----商品詳細txt----//
if (empty($_SESSION['product_info']["produot"])) { //値が空かチェック(商品詳細)
    $produot = "商品詳細未入力です"; //値が無けば未入力と表示
} else {
    $produot = $_SESSION['product_info']["produot"]; //値があればtru 
};
//----商品価格txt----//
if (empty($_SESSION['product_info']["price"])) { //値が空かチェック(商品値段)
    $price = "値段が未入力です";  //値が無けば未入力と表示
} else {
    $price = $_SESSION['product_info']["price"]; //price代入
    $price_t = $_SESSION['product_info']["price"] * 1.1;
};

$_SESSION['product'] = $_POST;


// //--------------------------------[カテゴリー処理]--------------------------------//
// //----DB接続----//
require_once "const.php";
$link = mysqli_connect(HOST, USER_ID, PASSWORD, DB_NAME);
mysqli_set_charset($link, 'utf8'); //文字コード設定

//----カテゴリープルダウン----//
$category = $_SESSION['product_info']["category"]; //カテゴリ-id受け取り
$category_id = intval($category); //カテゴリ-idをint型に変更

$category_sql = "SELECT category_id,category_name FROM category WHERE category_id =" . $category_id . ""; //カテゴリーid検索構文作成
$category_query = mysqli_query($link, $category_sql); //カテゴリ-sql実行
$category_top = mysqli_fetch_assoc($category_query); //カテゴリーsql一行取得
$k_select = "SELECT category_id,category_name FROM category WHERE category_name NOT IN('" . $category_top["category_name"] . "')"; //カテゴリーを取得したカテゴリー意外をselect構文作成
$q_select = mysqli_query($link, $k_select); //カテゴリー取得したカテゴリー意外を実行
$category_all = mysqli_fetch_all($q_select); //指定したカテゴリー意外は全部取得
array_unshift($category_all, $category_top); //カテゴリーの値を配列先頭に代入

//--------------------------------[txt/insert_clea.php]-----------------------------//


// 画像の処理

$upload_file = $_FILES['imgs'];
$_SESSION['imgs'] = $upload_file;
// 
if(!empty($_FILES['imgs']['name'][0])){
    // 画像表示部
    $img_data = [];

    for($i=0;$i<count($upload_file['name']);$i++){
    $fp = fopen($_SESSION['imgs']['tmp_name'][$i], "rb");
    $img = fread($fp, filesize($_SESSION['imgs']['tmp_name'][$i]));
    fclose($fp);


    $enc_img = base64_encode($img);

    $img_imfo = getimagesize('data:application/octet-stream;base64,'.$enc_img);

    $img_src = "data:".$img_imfo['mime'].";base64,".$enc_img;

    $img_data[] = $img_src;

    }

    // 仮フォルダへ移動
    for($i=0; $i < count($_SESSION['imgs']['tmp_name']);$i++){
        move_uploaded_file($_SESSION['imgs']['tmp_name'][$i],'./img/tmp/'.$_SESSION['imgs']['name'][$i]);
    }
}



require_once "tpl/insert_clea.php";
