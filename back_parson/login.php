<?php

if(!empty($_POST['new'])){
    header("location: new_insert.php");
}


if(!empty($_POST['submit'])){

    if(empty($_POST['login_id'])){
        $mess = "ログインIDを入力してください";
    }elseif(empty($_POST['login_password'])){
        $mess = "パスワードを入力してください";
    }else{
        require_once 'const.php';

        $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

        if(!$link){
        $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
        require_once './tpl/error.php';
        exit;
        }
        mysqli_set_charset($link,'utf8');

        $login_id = $_POST['login_id'];
        $password = $_POST['login_password'];

        $sql = "SELECT * FROM administrator WHERE administrator_name LIKE '".$login_id."'";
        $result = mysqli_query($link,$sql);
        if(!$result){
            $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
            require_once './tpl/error.php';
            exit;
        }
        $a_info = mysqli_fetch_all($result);



        if($login_id == $a_info[0][1]){
            if(password_verify($password,$a_info[0][2])){
                
                // セッションにデータを格納
                $_SESSION['user'] = $a_info[0][1];
                $_SESSION['password'] = $a_info[0][2];
                

                // ページを遷移させる
                header("location: top.php");
            }
            else{
                // 失敗文表示
                $nothing = "ユーザー名またはパスワードが違います";
            }
            
        }
        // header("location: top.php");
        }


    
}

require_once "tpl/login.php";