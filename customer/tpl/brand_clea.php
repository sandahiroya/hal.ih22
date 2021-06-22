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
         <h1>出品</h1>
    </header>
    <form action="./brandok.php" method="POST">
        <p class="productname">商品タイトル</p>
        <p class="product_title"><input type="text" name="title" value=<?php echo $title; ?>></p>
        <p class="product">商品詳細</p>
        <p class="details"><textarea type="text" name="product" class="detailarea" placeholder=<?php echo $produot; ?> rows="7" cols="50"></textarea></p>
       
        <table class="tables">  
            <tr class="price">
                <td>値段</td>
            </tr>
            <tr>
                <td><input type="text" name="price" value=<?php echo $price; ?>></td>
            </tr>

            <?php if (isset($price) and isset($price_t)) : ?>

                <tr class="name">
                    <td>手数料値段</td>
                </tr>
                <tr>
                    <td><input type="text" name="price_t" value=<?php echo $price_t; ?>></td>
                </tr>
                
            <?php endif ?>
            
        </table>
        <!--カテゴリー-->
        <p class="category_name"><span>カテゴリー</span></p>
        <p class="category">
            <select name="brand">
                <option value=<?php echo $category_top["brand_id"] ?>><?php echo $category_top["brand_name"]; ?></option>
                <?php for ($i = 1; $i < count($category_all); $i++) : ?>
                    <option value=<?php echo $category_all[$i][0]; ?>><?php echo $category_all[$i][1]; ?></option>
                <?php endfor ?>
            </select><br>
        </p>
        <p class="ok"><input type="submit" value="完了" id="submit"></p>
    </form>
</body>

</html>