<!doctype html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="./member_css/mypage.css">
</head>
<body>
<aside>

<h1>マイページ</h1>
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

<div class="form">
    <table>

        <tr>
            <td colspan="2"><span>姓</span></td><td colspan="1"><span><?php echo $user[0]['name_sei'];?></span></td>
            <td colspan="2"><span>名</span></td><td colspan="1"><span><?php echo $user[0]['name_mei']?></span></td>
        </tr>
        <tr>
            <td colspan="2"><span>セイ</span></td><td colspan="1"><span><?php echo $user[0]['kana_sei']?></span></td>
            <td colspan="2"><span>メイ</span></td><td colspan="1"><span><?php echo $user[0]['kana_mei']?></span></td>
        </tr>
        <tr>
            <td colspan="3"><span>郵便番号</span></td><td colspan="4"><span><?php echo $address[0]['address_number']; ?></span></td>
        </tr>
        <tr>
            <td colspan="3"><span>住所</span></td><td colspan="4"><span><?php echo $address[0]['customer_address'];?></span></td>
        </tr>
        <tr>
            <td colspan="3"><span>性別</span></td><td colspan="4"><span><?php echo $user[0]['gender'];?></span></td>
        </tr>
        <tr>
            <td colspan="3"><span>生年月日</span></td><td colspan="4"><span><?php echo $day;?></span></td>
        </tr>
        <tr>
            <td colspan="3"><span>電話番号</span></td><td colspan="4"><span><?php echo $user[0]['phone_number'];?></span></td>
        </tr>
        <tr>
            <td colspan="3"><span>メールアドレス</span></td><td colspan="4"><span><?php echo $user[0]['mail'];?></span></td>
        </tr>
    
    </table>
</div>


    <h2 class="stanp">スタンプ</h2>
    <img src="./stamp_img/<?php echo $stamp_img?>" alt="スタンプ画像">
   
    
</div>
</main>
</body>