<?php

// セッションをスタートさせる
session_start();
// 定数の情報取得
require_once './const.php';

if(!empty($_POST['submit']) && empty($_POST['user_name']) && empty($_POST['password'])){
    $mess = "入力してください";
}
elseif(!empty($_POST['new'])){
    header("location: member_registrarion.php");
}
// 入力された時の処理
elseif(!empty($_POST['submit']) && !empty($_POST['user_name']) && !empty($_POST['password'])){

    // DBの情報を入れるための配列
    $user_info = [];

    // 入力された情報を変数へ格納
    $user = $_POST['user_name'];
    $password = $_POST['password'];

    // var_dump($user);
    // var_dump($password);


    // データベース接続
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME );
    if(!$link){
        $err_msg = "予期せぬエラーが発生しました。しばらく経ってから再度お試しください。(101)";
        // require_once '../tpl/error.php';

        exit;
    }
    mysqli_set_charset($link,'utf8');


    

    // SQL文作成
    $sql = "SELECT mail,password,customer_delete FROM customer WHERE mail LIKE '" . $user . "'";
    $result = mysqli_query($link,$sql);

    if(!$result){
        // header('location: ../tpl/error.php');
        echo "ユーザー名・パスワードが違います";
    }
    else{
                // 取ってきた情報を配列に格納
        $user_info = mysqli_fetch_all($result);

        
        if($user_info[0][2] == NULL){
                // パスワードがあっているかどうか確認
                if(password_verify($password,$user_info[0][1])){
                    
                    // セッションにデータを格納
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;

                    $day = date('Ymd');

                    $sql = "UPDATE customer SET login_day = ".$day." WHERE mail LIKE '".$user."'";
                    $result = mysqli_query($link,$sql);
                    if(!$result){
                        echo "ユーザー名・パスワードが違います";
                    }
                    

                    // ページを遷移させる
                    header("location: mypage.php");
                }
                else{
                    // 失敗文表示
                    $mess =  "ユーザー名パスワードが違います";
                }
        }
    }
}
require_once "./member_tpl/login.php";

