<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert_clea.css">
    <title>Document</title>
</head>

<body>
<header>
    <h1>出品</h1></h1>
</header>
    <form action="./insertok.php" method="POST" enctype="multipart/form-data">
        <p class="productname">商品タイトル</p>
        <p class="product_title"><input type="text" name="product_title" value=<?php echo $title; ?>></p>
        <p class="details">商品詳細</P>
        <p class="product_details"><textarea type="text" name="detail" class="detailarea" placeholder=<?php echo $produot; ?> rows="7" cols="50" value=<?php echo $produot; ?>></textarea></p>
        <p class="price">値段</p>
        <p class="product_price"><input type="text" name="price" value=<?php echo $price; ?>></p>
        <?php if (isset($price) and isset($price_t)) : ?>
            <p class="price">手数料値段</p>
            <p class="product_price"><input type="text" name="price_tax" value=<?php echo $price_t; ?>></p>
        <?php endif ?>

        <!--カテゴリー-->
        <p class="category_name"><span>カテゴリー</span></p>
        <p class="category"><select name="category">
            <option value=<?php echo $category_top['category_id']?>><?php echo $category_top["category_name"]; ?></option>
            <?php for ($i = 1; $i < count($category_all); $i++) : ?>
                <option  value=<?php echo $category_all[$i][0]; ?>><?php echo $category_all[$i][1]; ?></option>
            <?php endfor ?>
            </select><br>
        </p>
        
        <div class="container">
        <?php if(!empty($img_data)){ 
            for($j=0;$j<count($img_data);$j++){ ?>
        <p><img src="<?php echo $img_data[$j];?>" class="imgs"></p>
        <?php } 
        }else{ ?>
            <p>画像はありません</p>
        <?php } ?>
        </div>

        <p class="submit_comp"><input type="submit" value="完了" id="submit" name="ok"></p>
    </form>
</body>

</html>