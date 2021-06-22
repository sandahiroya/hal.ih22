<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/form.css">
</head>
<body>
<header>
    <h1>会員情報削除</h1>
</header>
<main>
    <!--    input内にvalueで変更前のデータを初期値として表示-->
    <form action="" method="post">
    <div class="form">
        <table>
            <tr>
                <td colspan="2"><span>姓</span></td><td colspan="1"><span><?php echo $user[0]['name_sei'];?></span></td>
                <td colspan="2"><span>名</span></td><td colspan="1"><span><?php echo $user[0]['name_mei'];?></span></td>
            </tr>
            <tr>
                <td colspan="2"><span>セイ</span></td><td colspan="1"><span><?php echo $user[0]['kana_sei'];?></span></td>
                <td colspan="2"><span>メイ</span></td><td colspan="1"><span><?php echo $user[0]['kana_mei'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>郵便番号</span></td><td colspan="4"><span><?php echo $address[0]['address_number'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>住所</span></td><td colspan="4"><span><?php echo $address[0]['customer_address'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>性別</span></td><td colspan="4"><span><?php echo $user[0]['gender'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>生年月日</span></td><td colspan="4"><span><?php echo $user[0]['birthday'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>電話番号</span></td><td colspan="4"><span><?php echo $user[0]['phone_number'];?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>メールアドレス</span></td><td colspan="4"><span><?php echo $user[0]['mail'];?></span></td>
            </tr>
       
        </table>
        
        <input type="submit" id="submit" name="submit_comp" value="確認">
    </div>
        
    </form>

</main>
</body>