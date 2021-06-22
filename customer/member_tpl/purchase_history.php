<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/purchase_histry.css">
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
        
    <form action="" method="post">
 
    <form action="./evaluation_registration.php" method="post" class="info">

    <table class="history01">
        <tr><td rowspan="5"><img class="brand_img" src="./img/starter.jpg" alt="ジャケ写"></td></tr>
        <tr><td>商品名</td><td><?php echo $product[$cnt]['product_name'];?></td></tr>
        <tr><td>値段</td><td><?php echo $product[$cnt]['exhibit_price']?><td></tr>
        <tr><td>カテゴリー</td><td><?php echo $product[$cnt]['category_id'];?></td></tr>
        
        <tr><td>ブランド</td><td>
                <?php if($product[$cnt]['brand_id'] !== NULL){
                         echo $product[$cnt]['brand_id'];
                        }
                        
                        else{
                            echo "なし";
                        }?></td></tr>
   

    </table>
    <div class="ckeck">
        <a href="evaluation_registration.php?id=<?php echo $product[$cnt]['product_id']?>">評価</a>
    </div>
    </form>

    <?php }?>
<?php }
else{?>

    <p class="nothing">購入された商品がありません</p>
<?php } ?>
    

   
</main>
</body>

