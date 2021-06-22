<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>商品出品</h1>
    </header>
    <main>
        <form action="./insert_img.php" method="POST" enctype="multipart/form-data">
            <p class="productname"><span>商品タイトル</span></p>
            <p class="product_title"><input type="text" name="title"></p>
            <p class="product"><span>商品詳細</span></p>
            <p class="details"><textarea name="produot" class="deteailarea" rows="7" cols="50"></textarea></p>
            <table class="tables">
                <tr>
                    <td><span>値段</span></td>
                </tr>
                <tr>
                    <td><input type="text" name="price"></td>
                </tr>
                    
            </table>
    
    
        <p class="category"><span>カテゴリ</span></p>
        <p class="category_name">
            <select name="category">
                <?php for ($i = 1; $i < count($category); $i++) : ?>
                    <option value=<?php echo $category[$i][0]; ?>><?php echo $category[$i][1]; ?></option>
                <?php endfor ?>
            </select>
        </p>

    
        <div class="ok">
            <input type="submit" value="完了" id="submit">
        </div>
        </form>

    </main>
</body>

</html>