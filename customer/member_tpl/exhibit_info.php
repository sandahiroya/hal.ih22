<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/product_info.css">
</head>
<body>
<aside>

<h1>購入履歴</h1>
<form action="" method="post">
    <div class="logout">
        <input type="submit" id="button" name="logout" value="ログアウト"></input>

        <input type="submit" id="button" name="top" value="トップページへ"></input>
    </div>
</form>
   

    <h3><a href="purchase_history.php">購入履歴</a></h3>
    <h3><a href="exhibit_info.php">出品履歴</a></h3>
    <h3><a href="stanp.php">スタンプ情報</a></h3>
    <h3><a href="member_datachange.php">会員情報変更</a></h3>
    <h3><a href="member_delete.php">会員情報削除</a></h3>

</aside>
<main>

<?php if(!empty($product[0]['product_name'])){ ?>
    
    <?php for($cnt=0;$cnt<count($product);$cnt++){?>
        
    <!-- <form action="" method="post"> -->

    <table class="history01">
        <tr><td rowspan="6"><img class="brand_img" src="./img/brand.jpg" alt="ジャケ写"></td></tr>
        <div class=""><tr><td colspan="3">商品名</td><td colspan="1"><?php echo $product[$cnt]['product_name'];?></td></tr>
        <div class=""><tr><td colspan="3">値段</td><td colspan="1"><?php echo $product[$cnt]['exhibit_price']?></td></tr>
        <div class=""><tr><td colspan="3">カテゴリ</td><td colspan="1"><?php echo $product[$cnt]['category_id'];?></td></tr>
       
        <tr><td colspan="3">ブランド</td>
            <td colspan="2"><?php if($product[$cnt]['brand_id'] !== NULL){
                         echo $product[$cnt]['brand_id'];
                        }
                        else{
                            echo "なし";
                        }?>
            </td></tr>


        <div class=""><tr><td colspan="3">商品詳細</td><td><?php echo $list[$cnt]['product_detail'];?></td></tr>
      
        
    </table>

    <a href="product_change.php?id=<?php echo $product[$cnt]['product_id']?>"><input type="submit" id="submit" name="product_change" value="変更"></input></a>
    <a href="product_delete.php?id=<?php echo $product[$cnt]['product_id']?>"><input type="submit" id="submit" name="product_delete" value="削除"></input></a>

    <!-- </form> -->

    <?php }?>
    

<?php }
else{?>

    <p>出品された商品がありません</p>
<?php } ?>
    
    

   
</main>
</body>
