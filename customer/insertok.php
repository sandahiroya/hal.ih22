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

//--------------------------------[ID処理]--------------------------------//
//----商品ID作成----//
$sql = "select COUNT(*) FROM product"; //productのidを全件カウント構文
$sql_query = mysqli_query($link, $sql); //productのidを全件カウント処理実行
$sql_assoc = mysqli_fetch_assoc($sql_query); //数えたid一行取得
$sql_product = $sql_assoc["COUNT(*)"] + 1; //数えたid+1

//----カテゴリーID作成----//
$category_id = $_POST["category"]; //カテゴリーid取得
$category_id = intval($category_id);

//--------------------------------[商品INSERT処理]--------------------------------//
//----商品INSERT素材----//
$title = $_POST["product_title"]; //商品タイトル取得
$price = $_POST["price"]; //商品値段取得
$exhibit_price = $_POST["price_tax"]; //商品手数料
$day = date("Ymd"); //出品日

//----商品追加INSERT----//
$insert = "INSERT INTO product(product_id,category_id,product_name,product_price,exhibit_price,registration_date)
VALUES(" . $sql_product . "," . $category_id . ",'" . $title . "'," . $price . "," . $exhibit_price . "," . $day . ")"; //カテゴリーidをINSERT構文作成

$result = mysqli_query($link,$insert);

if(!$result){
    echo "エラー1";
}

//--------------------------------[商品詳細INSERT処理]--------------------------------//
//----商品詳細id素材----//
$a = $_SESSION["user"];

// 会員idを取得
$sql = "SELECT customer_id FROM customer WHERE mail LIKE '". $a ."'";
$result = mysqli_query($link,$sql);

if(!$result){
    echo "エラー2";
}

$customer_id = mysqli_fetch_assoc($result);
// 会員I'dをint型に変更
$customer_id = (int)$customer_id['customer_id'];


// // //会員の情報メールアドレスで絞りこむ構文作成
// // //----商品詳細INSERT素材----//
$produot = $_SESSION["product_info"]['produot']; //商品詳細受けとる


// 出品件数を取得してそこから出品idを取得する
$sql = "SELECT COUNT(exhibit_id) FROM exhibit";
$result = mysqli_query($link,$sql);

if(!$result){
    echo "エラー3";
}

$exhibit_id = mysqli_fetch_assoc($result);

// 出品I'dをint型に変更
$exhibit_id = (int)$exhibit_id['COUNT(exhibit_id)'];
$exhibit_id = $exhibit_id + 3;

$product_detail = $_SESSION['product_info']['produot']; 

$sql = "INSERT INTO exhibit(customer_id,product_id,exhibit_id,exhibit_comp_day,product_detail)
VALUES(".$customer_id.",".$sql_product.",".$exhibit_id.",".$day.",'".$product_detail."')"; //商品詳細INSERT構文生成

// INSERT実行
$result = mysqli_query($link, $sql); //カテゴリ-id実行

if(!$result){
    echo "エラー4";
}


// // //--------------------------------[商品画像処理]--------------------------------//

if(!empty($_SESSION['imgs']['name'][0])){
    
    $img_info = $_SESSION['imgs'];
    $img_ex = [];
    for($i = 0; $i < count($img_info['name']);$i++){
        $img_ex[] = explode('.', $img_info['name'][$i]); //分割
    }


    // // //----画像id----//
    $sql_count = "SELECT COUNT(*) FROM product_img"; 
    $result = mysqli_query($link, $sql_count); 

    if(!$result){
        echo "エラー5";
    }

    $count = mysqli_fetch_assoc($result); //一行取得
    $new_id = $count["COUNT(*)"] + 1; //画像カウントし+1


    for($j=0;$j<count($img_ex);$j++){
        $img_ex[$j][0] = $new_id."_".($j+1);
    }

    // 仮のフォルダから本フォルダへ移動
    for($j=0;$j<count($_SESSION['imgs']['tmp_name']);$j++){
        rename('./img/tmp/'.$_SESSION['imgs']['name'][$j],'./img/main/'.$_SESSION['imgs']['name'][$j]);
        rename('./img/main/'.$_SESSION['imgs']['name'][$j],'./img/main/'.$img_ex[$j][0].".".$img_ex[$j][1]);
    }

    for($m=0;$m<count($img_info['name']);$m++){
        // // //----画像INSERT----//
        $sql = "INSERT INTO product_img(img_id,product_id,img_name,extension)
        VALUES(".($new_id + $m).",".$sql_product.",'".$img_ex[$m][0]."','".$img_ex[$m][1]."')"; //INSERT構文

        $result = mysqli_query($link,$sql);

        // // //INSERT実行
        if(!$result){
            echo "エラー7";
        }
    }

}




require_once 'tpl/insertok.php';







// session_destroy();
