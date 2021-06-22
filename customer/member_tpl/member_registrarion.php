<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./member_css/confirmation.css">
</head>
<body>
<header>
<h1>会員登録</h1>
</header>
<main>

<?php if(!empty($_SESSION['error'])){?>
<p><?php echo $_SESSION['error']; ?></p>
<?php } ?>

<form action="member_confirmation.php" method="post">
<div class="form">
<table>
    <tr>

        <td colspan="2"><span>姓</span></td><td colspan="1"><input type="text" name="fam_name" id="name" value=<?php if (!empty($fam_name)) { echo $fam_name;}else{echo "";}?>></td>
   
        <td colspan="2"><span>名</span></td><td colspan="1"><input type="text" name="name" id="name" value=<?php if(!empty($fam_name)){ echo $name;}?>></td>
    </tr>
    <tr>
        <td colspan="2"><span>セイ</span></td><td colspan="1"><input type="text" name="fam_name_ruby" id="name" value=<?php if(!empty($fam_name_ruby)){echo $fam_name_ruby;}?>></td>
  
        <td colspan="2"><span>メイ</span></td><td colspan="1"><input type="text" name="name_ruby" id="name" value=<?php if(!empty($fam_name_ruby)){ echo $name_ruby;}?>></td>
    </tr>
    <tr>
        <td colspan="3"><span>郵便番号</span></td><td colspan="4"><input type="text" name="zipcode" id="zipcode" value=<?php if(!empty($fam_name_ruby)){echo $zip_code;}?>></td>
    </tr>
    <tr>
        <td colspan="3"><span>住所</span></td><td colspan="4"><input type="text" name="address" id="address" value=<?php if(!empty($fam_name_ruby)){echo $address;}?>></td>
    </tr>
    <tr>
        <td colspan="3"><span>性別</span></td>
        <td colspan="4"><select name="gender">
                <option value="male">男</option>
                <option value="female">女</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="3"><span>生年月日</span></td><td colspan="4"><input type="text" name="birthday" id="birthday" value=<?php if(!empty($fam_name_ruby)){echo $birthday;} ?>></td>
    </tr>
    <tr>
        <td colspan="3"><span>電話番号</span></td><td colspan="4"><input type="tel" name="number" id="number" value=<?php if(!empty($fam_name_ruby)){ echo $phone_number;}?>></td>
    </tr>
    <tr>
        <td colspan="3"><span>メールアドレス</span></td><td colspan="4"><input type="text" name="mail" id="mail" value=<?php if(!empty($fam_name_ruby)){ echo $mail_address;}?>></td>
    </tr>
    <tr>
        <td colspan="3"><span>パスワード</span></td><td colspan="4"><input type="password" name="password" id="password"></td>
    </tr>
</table>
    <input id="submit" name="submit" type="submit" value="送信">

</div>
</form>
</main>
</body>