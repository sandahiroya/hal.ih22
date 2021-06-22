<?php
require_once 'const.php';
session_start();
// var_dump($_POST['return']);
if(!empty($_POST['return'])){
  header('location: top.php');
}
else{
    $link = @mysqli_connect( HOST , USER_ID , PASSWORD , DB_NAME);

  if(!$link){
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：103)';
    require_once './tpl/error.php';
    exit;
  }

  mysqli_set_charset($link,'utf8');

  //カートに入れるがクリックされたときにIDがGETできずエラーになるのでセッション化
  if(isset($_GET['id'])){
  $_SESSION['id'] = $_GET['id'];
  }
  
  

  $product_sql = "SELECT product_id,category_id,brand_id,product_name,product_price,exhibit_price FROM product WHERE product_id =" .$_SESSION['id'];
  $product = mysqli_query($link,$product_sql);
  if(!$product){
    mysqli_close($link);
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
    require_once './tpl/error.php';
    exit;
  }
  $product_row = mysqli_fetch_assoc($product);


  // $sql = "SELECT product_detail FROM exhibit WHERE product_id =" .$_SESSION['id'];
  // $detail = mysqli_query($link,$sql);
  // if(!$product){
  //   mysqli_close($link);
  //   $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
  //   require_once './tpl/error.php';
  //   exit;
  // }
  // $product_row = mysqli_fetch_assoc($product);


  $img_sql = "SELECT img_id,product_id,img_name,extension FROM product_img WHERE product_id =" .$_SESSION['id'];
  $product_img = mysqli_query($link,$img_sql);
  if(!$product_img){
    mysqli_close($link);
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
    require_once './tpl/error.php';
    exit;
  }

  $img_info = mysqli_fetch_all($product_img);


  // var_dump();

  //その商品に登録されている写真の枚数(スターターの場合)
  /*
    if($product_row['brand_id'] == "0"){
      $img_num = mysqli_num_rows($product_img);//現在のテーブルのデータの件数
    }else{
      $img_num = 1;
    }
  */

  //var_dump($product_row['brand_id']);

  /*
    if($product_row['brand_id'] == "0"){
      $img = $img_list[$i];
      //$img =  $img_list[$i]['img_name']."." . $img_list[$i]['extension'];
    //var_dump($img);
    }else{
      $img = $product_row['category_id'] . '.jpg';
    }
  */




  $exhibit = mysqli_query($link,"SELECT customer_id,product_id,request_id,exhibit_id,exhibit_comp_day,product_detail FROM exhibit WHERE product_id =" .$_SESSION['id']);
  $exhibit_num = mysqli_num_rows($exhibit);
  if(!$exhibit){
    mysqli_close($link);
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
    require_once './tpl/error.php';
    exit;
  }
  $detail_list = [];
 
    $exhibit_row = mysqli_fetch_assoc($exhibit);
    $detail_list[] = $exhibit_row['product_detail'];

  

  $category = mysqli_query($link,"SELECT category_id,category_name FROM category WHERE category_id =" .$product_row['category_id']);
  if(!$category){
    mysqli_close($link);
    $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
    require_once './tpl/error.php';
    exit;
  }
  $category_row = mysqli_fetch_assoc($category);


  if(isset($product_row['brand_id'])){
    $brand = mysqli_query($link,"SELECT category_id,brand_id,brand_name FROM brand WHERE brand_id =" .$product_row['brand_id']);
    if(!$brand){
      mysqli_close($link);
      $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
      //require_once './tpl/error.php';
      exit;
    }
    $brand_row = mysqli_fetch_assoc($brand);
    $msg = 'ブランド：';
    $msg2 = $brand_row['brand_name'];
    $img_num = 1;
    $return = "brand_luckybag.php";
    }else{
      $msg = '';
      $msg2 = '';
      $img_num = mysqli_num_rows($product_img);//現在のテーブルのデータの件数
      $return = "starterpack.php";
    }




  //カートへ入れるが押されたら
  if(isset($_POST['cart'])){
    $user = $_SESSION['user'];

    $sql = "SELECT customer_id FROM customer WHERE mail LIKE '".$user."'";
    $result = mysqli_query($link,$sql);
    if(!$result){
      mysqli_close($link);
      $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
      require_once './tpl/error.php';
      exit;
    }
    $user_id = mysqli_fetch_assoc($result);
  
    $sql = "SELECT customer_id FROM exhibit WHERE product_id = ".$_POST['cart']."";
    $result = mysqli_query($link,$sql);
    if(!$result){
      mysqli_close($link);
      $err_msg = '予期せぬエラーが発生しました。しばらくたってから再度お試しください。(エラーコード：104)';
      require_once './tpl/error.php';
      exit;
    }
    $exhibi_customer_id = mysqli_fetch_assoc($result);
    if($exhibi_customer_id === $user_id){
      $error = "出品者が同じ会員のためカートに入れられません";
    }else{
        //カートに商品が存在していたら
      if(isset($_SESSION['product'])){
        //カートに入れようとした商品がすでにある商品と重複していないかの確認
        $check = array_search($_POST['cart'], $_SESSION['product']);
        if($check !== false){
          echo "この商品はすでに登録されています";
        }else{
          $_SESSION['product'][] = $_POST['cart'];
        }
      }else{
        $_SESSION['product'] = [];
        $_SESSION['product'][] = $_POST['cart'];
      }
    }
    
  }


  mysqli_close($link);

  require_once 'tpl/product_detail.php';
}


?>