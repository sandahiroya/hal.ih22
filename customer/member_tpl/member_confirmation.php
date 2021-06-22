<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>入力確認</h1>
</header>
<form action="" method="post">
    <main>
    <div class="form">
        <table>
            <tr>
                <td colspan="2"><span>姓</span></td><td colspan="1"><span><?php echo $fam_name;?></span></td>
                <td colspan="2"><span>名</span></td><td colspan="1"><span><?php echo $name?></span><br></td>
            <tr>
                <td colspan="2"><span>セイ</span></td><td colspan="1"><span><?php echo $fam_name_ruby?></span></td>
                <td colspan="2"><span>メイ</span></td><td colspan="1"><span><?php echo $name_ruby?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>郵便番号</span></td><td colspan="4"><span><?php echo $zip_code?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>住所</span></td><td colspan="4"><span><?php echo $address;?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>性別</span></td><td colspan="4"><span><?php echo $gender;?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>生年月日</span></td><td colspan="4"><span><?php echo $birthday?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>電話番号</span></td><td colspan="4"><span><?php echo $phone_number;?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>メールアドレス</span></td><td colspan="4"><span><?php echo $mail;?></span></td>
            </tr>
            <tr>
                <td colspan="3"><span>パスワード</span></td><td colspan="4"><span><?php echo $user_password;?></span></td>
            </tr>

        </table>
        <input type="submit" name="return" id="submit" value="戻る">
        <input type="submit" name="submit" id="submit" value="確認">
    </div>
    </main>
</form>
</body>