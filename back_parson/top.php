<?php
session_start();

if(!empty($_POST['logout'])){
    session_destroy();
    header("location: login.php");
}

require_once 'const.php';
require_once "functions.php";

    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

    if(!$link){
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
    require_once './tpl/error.php';
    exit;
    }
    mysqli_set_charset($link,'utf8');

// 売り上げの処理
if(!empty($_POST['all_up'])){
    $mess =  "売り上げ部分";
    $sql = "SELECT exhibit_price FROM product";
    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー1";
    }

    $price = mysqli_fetch_all($result);

    $price_sum = 0;
    for($l=0;$l < count($price);$l++){
        $price_sum = $price_sum + ($price[$l][0] / 10);
    }


    $five_year = (int)date('Y',strtotime("-4 year"));
    $foru_year = (int)date('Y',strtotime("-3 year"));
    $three_year = (int)date('Y',strtotime("-2 year"));
    $two_year = (int)date('Y',strtotime("-1 year"));
    $this_year = (int)date('Y');

    $sql = "SELECT SUM(exhibit_price) FROM product WHERE registration_date < ".$five_year."-12-31";
    

    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー1";
    }

    $five_sum = mysqli_fetch_assoc($result);

    if($five_sum["SUM(exhibit_price)"] == NULL){
        $five_sum = 0;
    }

    $sql = "SELECT SUM(exhibit_price) FROM product WHERE registration_date < ".$foru_year."-12-31";
    

    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー1";
    }

    $foru_sum = mysqli_fetch_assoc($result);

    if($foru_sum["SUM(exhibit_price)"] == NULL){
        $foru_sum = 0;
    }
    $sql = "SELECT SUM(exhibit_price) FROM product WHERE registration_date < ".$three_year."-12-31";
    

    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー1";
    }

    $three_sum = mysqli_fetch_assoc($result);

    if($three_sum["SUM(exhibit_price)"] == NULL){
        $three_sum = 0;
    }

    $sql = "SELECT SUM(exhibit_price) FROM product WHERE registration_date < ".$two_year."-12-31";
    

    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー1";
    }

    $two_sum = mysqli_fetch_assoc($result);

    if($two_sum["SUM(exhibit_price)"] == NULL){
        $two_sum = 0;
    }


    
}

// 商品のカテゴリー絞り込みの処理
if(!empty($_POST['category'])){

    $cnt = 0;

    for($i = 1; $i < count($_POST['category']);$i++){

        $category_number =  $_POST['category'][$cnt];

        $sql = "SELECT * FROM product WHERE category_id = ".$category_number."";

        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $product = mysqli_fetch_all($result);

        for($n=0;$n < count($product);$n++){
            $product_info[] = $product[$n];
        }

        $cnt = $cnt + 1;
    }


    if(!empty($product_info)){
        $category_name = [];

        for($j=0;$j < count($product_info);$j++){
            $sql = "SELECT category_name FROM category WHERE category_id = ".$product_info[$j][1]."";
            $result = mysqli_query($link,$sql);
            if(!$result){
                echo "エラー２";
            }
            $category_name[$j] = mysqli_fetch_assoc($result);

            $product_info[$j][1] = $category_name[$j]["category_name"];

        }


        $brand_name = [];
        for($k=0;$k < count($product_info);$k++){
            if($product_info[$k][2] !== NULL){
                $sql = "SELECT brand_name FROM brand WHERE brand_id = ".$product_info[$k][2]."";
                $result = mysqli_query($link,$sql);
                if(!$result){
                    echo "エラー２";
                }
                $brand_name[$k] = mysqli_fetch_assoc($result);

                $product_info[$k][2] = $brand_name[$k]["brand_name"];
            }
        }
      
    }else{
        $null_mess = "商品がありません";
    }
      
}

// 商品部分の処理
if(!empty($_POST['product']) || !empty($_POST['up']) || !empty($_POST['down']) || !empty($_POST['search']) || !empty($_POST['price_up']) || !empty($_POST['price_down']) || !empty($_POST['day_up']) || !empty($_POST{'day_down'}) || !empty($_POST['sold'])){
    $mess = "商品部分";
    if(!empty($_POST['product'])){
        $sql = "SELECT * FROM product ";
    }elseif(!empty($_POST['up'])){
        $sql = "SELECT * FROM product ORDER BY product_id DESC";
    }elseif(!empty($_POST['down'])){
        $sql = "SELECT * FROM product ORDER BY product_id ASC";
    }elseif(!empty($_POST['search'])){
        $search = $_POST['search_word'];
        $sql = "SELECT * FROM product WHERE product_name LIKE '".$search."'";
    }elseif(!empty($_POST['price_up'])){
        $sql = "SELECT * FROM product ORDER BY exhibit_price DESC";
    }elseif(!empty($_POST['price_down'])){
        $sql = "SELECT * FROM product ORDER BY exhibit_price ASC";
    }elseif(!empty($_POST{'day_up'})){
        $sql = "SELECT * FROM product ORDER BY registration_date DESC";
    }elseif(!empty($_POST{'day_down'})){
        $sql = "SELECT * FROM product ORDER BY registration_date ASC";
    }elseif(!empty($_POST['sold'])){
        $sql = "SELECT * FROM product WHERE sold_day IS NOT NULL";
    }
    
    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー１";
    }
    $product_info = mysqli_fetch_all($result);

    $category_name = [];

    for($j=0;$j < count($product_info);$j++){
        $sql = "SELECT category_name FROM category WHERE category_id = ".$product_info[$j][1]."";
        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー２";
        }
        $category_name[$j] = mysqli_fetch_assoc($result);

        $product_info[$j][1] = $category_name[$j]["category_name"];

    }


    $brand_name = [];
    for($k=0;$k < count($product_info);$k++){
        if($product_info[$k][2] !== NULL){
            $sql = "SELECT brand_name FROM brand WHERE brand_id = ".$product_info[$k][2]."";
            $result = mysqli_query($link,$sql);
            if(!$result){
                echo "エラー２";
            }
            $brand_name[$k] = mysqli_fetch_assoc($result);

            $product_info[$k][2] = $brand_name[$k]["brand_name"];
        }
        

    }

}

// ユーザー情報の処理
if(!empty($_POST['user_info']) || !empty($_POST['day_user']) || !empty($_POST['week_user']) || !empty($_POST['month_user']) || !empty($_POST['year_user']) || !empty($_POST['registration_up']) || !empty($_POST['registration_down']) || !empty($_POST['login_up']) || !empty($_POST['login_down']) || !empty($_POST['man']) || !empty($_POST['woman'])){
    $mess = "ユーザー状況部分";

    if(!empty($_POST['user_info'])){
        unset($_SESSION['activ']);
        $_SESSION['activ'] = "user";
        // echo "通過";
    }elseif(!empty($_POST['day_user'])){
        unset($_SESSION['activ']);
        $_SESSION['activ'] = "day";
    }elseif(!empty($_POST['week_user'])){
        unset($_SESSION['activ']);
        $_SESSION['activ'] = "week";
        echo "3";
    }elseif(!empty($_POST['month_user'])){
        unset($_SESSION['activ']);
        $_SESSION['activ'] = "month";
    }elseif(!empty($_POST['year_user'])){
        unset($_SESSION['activ']);
        $_SESSION['activ'] = "year";
    }

    
    if((($_SESSION['activ'] == "user") || $_SESSION['activ'] === "user" && !empty($_POST['registration_up'])) || ($_SESSION['activ'] == "user" && !empty($_POST['registration_down'])) || ($_SESSION['activ'] == "user" && !empty($_POST['login_up'])) || ($_SESSION['activ'] == "user" && !empty($_POST['login_down'])) || ($_SESSION['activ'] == "user" && !empty($_POST['man'])) || $_SESSION['activ'] == "user" && !empty($_POST['woman'])){

        if(!empty($_POST['registration_up'])){
            $sql = "SELECT * FROM customer ORDER BY register_day DESC";
        }elseif(!empty($_POST['registration_down'])){
            $sql = "SELECT * FROM customer ORDER BY register_day ASC";
        }elseif(!empty($_POST['login_up'])){
            $sql = "SELECT * FROM customer ORDER BY login_day DESC";
        }elseif(!empty($_POST['login_down'])){
            $sql = "SELECT * FROM customer ORDER BY login_day ASC";
        }elseif(!empty($_POST['man'])){
            $sql = "SELECT * FROM customer ORDER BY gender DESC";
        }elseif(!empty($_POST['woman'])){
            $sql = "SELECT * FROM customer ORDER BY gender ASC";
        }
        else{
            $sql = "SELECT * FROM customer";
        }


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_info = mysqli_fetch_all($result);

  

    }elseif(($_SESSION['activ'] == 'day') || ($_SESSION['activ'] == 'day' && !empty($_POST['registration_up'])) || ($_SESSION['activ'] == 'day' && !empty($_POST['registration_down'])) || ($_SESSION['activ'] == 'day' && !empty($_POST['login_up'])) || ($_SESSION['activ'] == 'day' && !empty($_POST['login_down'])) || ($_SESSION['activ'] == 'day' && !empty($_POST['man'])) || ($_SESSION['activ'] == 'day' && !empty($_POST['woman']))){
        $day = date('Ymd');

   
        if(!empty($_POST['registration_up'])){
            $sql = "SELECT * FROM customer WHERE login_day = ".$day." ORDER BY register_day DESC";
        }elseif(!empty($_POST['registration_down'])){
            $sql = "SELECT * FROM customer WHERE login_day = ".$day." ORDER BY register_day ASC";
        }elseif(!empty($_POST['login_up'])){
            $sql = "SELECT * FROM customer WHERE login_day = ".$day." ORDER BY login_day DESC";
        }elseif(!empty($_POST['login_down'])){
            $sql = "SELECT * FROM customer WHERE login_day = ".$day." ORDER BY login_day ASC";
        }elseif(!empty($_POST['man'])){
            $sql = "SELECT * FROM customer WHERE login_day = ".$day." ORDER BY gender DESC";
        }elseif(!empty($_POST['woman'])){
            $sql = "SELECT * FROM customer WHERE login_day = ".$day." ORDER BY gender ASC";
        }
        else{
            $sql = "SELECT * FROM customer WHERE login_day = ".$day."";
        }


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_info = mysqli_fetch_all($result);
        // var_dump($sql);

        $day = date('Ymd');
        $sql = "SELECT COUNT(*) FROM customer WHERE login_day = ".$day."";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_percent = mysqli_fetch_all($result);

        $user_percent = (int)$user_percent[0][0];

        $sql = "SELECT COUNT(*) FROM customer";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $all_percent = mysqli_fetch_all($result);

        $all_percent = (int)$all_percent[0][0];

        $percent = ($user_percent / $all_percent) * 100;

        $percent = floor($percent);


    }elseif(($_SESSION['activ'] == "week") || ($_SESSION['activ'] == "week" && !empty($_POST['registration_up'])) || ($_SESSION['activ'] == "week" && !empty($_POST['registration_down'])) || ($_SESSION['activ'] == "week" && !empty($_POST['login_up'])) || ($_SESSION['activ'] == "week" && !empty($_POST['login_down'])) || ($_SESSION['activ'] == "week" && !empty($_POST['man'])) || ($_SESSION['activ'] == "week" && !empty($_POST['woman']))){
        $fin_day = date('Ymd');
        $start_day = date('Ymd',strtotime("-1 week"));

  
        if(!empty($_POST['registration_up'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY register_day DESC";
        }elseif(!empty($_POST['registration_down'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY register_day ASC";
        }elseif(!empty($_POST['login_up'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY login_day DESC";
        }elseif(!empty($_POST['login_down'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY login_day ASC";
        }elseif(!empty($_POST['man'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY gender DESC";
        }elseif(!empty($_POST['woman'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY gender ASC";
        }
        else{
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day."";
        }


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_info = mysqli_fetch_all($result);


        $sql = "SELECT COUNT(*) FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day."";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_percent = mysqli_fetch_all($result);

        $user_percent = (int)$user_percent[0][0];

        $sql = "SELECT COUNT(*) FROM customer";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $all_percent = mysqli_fetch_all($result);

        $all_percent = (int)$all_percent[0][0];

        $percent = ($user_percent / $all_percent) * 100;

        $percent = floor($percent);



    }elseif(($_SESSION['activ'] == "month") || ($_SESSION['activ'] == "month" && !empty($_POST['registration_up'])) || ($_SESSION['activ'] == "month" && !empty($_POST['registration_down'])) || ($_SESSION['activ'] == "month" && !empty($_POST['login_up'])) || ($_SESSION['activ'] == "month" && !empty($_POST['login_down'])) || ($_SESSION['activ'] == "month" && !empty($_POST['woman']))){
        $fin_day = date('Ymd');
        $start_day = date('Ymd',strtotime("-1 month"));

        if(!empty($_POST['registration_up'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY register_day DESC";
        }elseif(!empty($_POST['registration_down'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY register_day ASC";
        }elseif(!empty($_POST['login_up'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY login_day DESC";
        }elseif(!empty($_POST['login_down'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY rlogin_day ASC";
        }elseif(!empty($_POST['man'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY gender DESC";
        }elseif(!empty($_POST['woman'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY gender ASC";
        }
        else{
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day."";
        }


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_info = mysqli_fetch_all($result);



        $sql = "SELECT COUNT(*) FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day."";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_percent = mysqli_fetch_all($result);

        $user_percent = (int)$user_percent[0][0];

        $sql = "SELECT COUNT(*) FROM customer";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $all_percent = mysqli_fetch_all($result);

        $all_percent = (int)$all_percent[0][0];

        $percent = ($user_percent / $all_percent) * 100;

        $percent = floor($percent);


        
    }elseif(($_SESSION['activ'] == "year") || ($_SESSION['activ'] == "year" && !empty($_POST['registration_up'])) || ($_SESSION['activ'] == "year" && !empty($_POST['registration_down'])) || ($_SESSION['activ'] == "year" && !empty($_POST['login_up'])) || ($_SESSION['activ'] == "year" && !empty($_POST['login_down'])) || ($_SESSION['activ'] == "year" && !empty($_POST['man'])) || ($_SESSION['activ'] == "year" && !empty($_POST['woman']))){
        $fin_day = date('Ymd');
        $start_day = date('Ymd',strtotime("-1 year"));

        if(!empty($_POST['registration_up'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY register_day DESC";
        }elseif(!empty($_POST['registration_down'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY register_day ASC";
        }elseif(!empty($_POST['login_up'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY login_day DESC";
        }elseif(!empty($_POST['login_down'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY rlogin_day ASC";
        }elseif(!empty($_POST['man'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY gender DESC";
        }elseif(!empty($_POST['woman'])){
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day." ORDER BY gender ASC";
        }
        else{
            $sql = "SELECT * FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day."";
        }

        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_info = mysqli_fetch_all($result);


        $sql = "SELECT COUNT(*) FROM customer WHERE login_day BETWEEN ".$start_day." AND ".$fin_day."";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $user_percent = mysqli_fetch_all($result);

        $user_percent = (int)$user_percent[0][0];

        $sql = "SELECT COUNT(*) FROM customer";


        $result = mysqli_query($link,$sql);
        if(!$result){
            echo "エラー１";
        }
        $all_percent = mysqli_fetch_all($result);

        $all_percent = (int)$all_percent[0][0];

        $percent = ($user_percent / $all_percent) * 100;

        $percent = floor($percent);

    }


    $sql = "SELECT COUNT(*) FROM customer";


    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー１";
    }
    $user_gender = mysqli_fetch_all($result);

    $all_user = (int)$user_gender[0][0];

    $sql = "SELECT COUNT(*) FROM customer WHERE gender LIKE '男'";


    $result = mysqli_query($link,$sql);
    if(!$result){
        echo "エラー１";
    }
    $user_gender = mysqli_fetch_all($result);

    $man = (int)$user_gender[0][0];
    

    $man_percent = ($man / $all_user) * 100;

    $woman_percent =  100 - $man_percent;


}

// 商品検索の処理
if(!empty($_POST['search'])){
    
}




require_once "tpl/top.php";
