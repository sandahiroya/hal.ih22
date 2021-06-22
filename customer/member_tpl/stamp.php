<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
    <style>
        aside{
            height:88vh;
        }
    </style>
</head>
<body>
<aside>

<h1>スタンプ</h1>
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

    <h2>スタンプ</h2>
    <img src="./stamp_img/<?php echo $stamp_img?>" alt="スタンプ画像">
    
    
    <p><a href="mypage.php">戻る</a></p>

    
</form>
</main>
</body>
   