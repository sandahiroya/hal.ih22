<?php 
require_once "const.php";

$link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

if(!$link){
$err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
require_once './tpl/error.php';
exit;
}
mysqli_set_charset($link,'utf8');


function arrysort($data){
    if($data == "昇順"){
        $sql = "SELECT * FROM customer ORDER BY registration_date DESC";

    }elseif(!empty($data)){

        $sql = "SELECT * FROM customer ORDER BY registration_date ASC";

    }elseif($data){
        $sql = "SELECT * FROM customer ORDER BY login_day DESC";


    }elseif($data){
        $sql = "SELECT * FROM customer ORDER BY login_day ASC";


    }elseif($data){
        $sql = "SELECT * FROM customer WHERE gender LIKE '男'";


    }elseif($data){
        $sql = "SELECT * FROM customer WHERE gender LIKE '女";

    }else{
        $user_info = "データなし";
    }

    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー１";
    }
    $user_info = mysqli_fetch_all($result);

    return $user_info;

}

?>



